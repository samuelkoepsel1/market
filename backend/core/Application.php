<?php

namespace app\core;

use Throwable;

/**
 * @package app\core
 */
class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public static Application $app;
    public static string $ROOT_DIR;
    public Router $router;
    public ?Controller $controller = null;
    public Database $db;

    public function __construct($rootDir, $config)
    {
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->db = new Database($config['db']);
    }

    private function initRoutes()
    {
        $this->router = new Router();
        $this->router->addNewRoute('GET', '\product-type', 'app\controller\ProductTypeController', 'get');
        $this->router->addNewRoute('POST', '\product-type', 'app\controller\ProductTypeController', 'post');
        $this->router->addNewRoute('PATCH', '\product-type', 'app\controller\ProductTypeController', 'patch');
        $this->router->addNewRoute('DELETE', '\product-type', 'app\controller\ProductTypeController', 'delete');

        $this->router->addNewRoute('GET', '\tax', 'app\controller\TaxController', 'get');
        $this->router->addNewRoute('POST', '\tax', 'app\controller\TaxController', 'post');
        $this->router->addNewRoute('PATCH', '\tax', 'app\controller\TaxController', 'patch');
        $this->router->addNewRoute('DELETE', '\tax', 'app\controller\TaxController', 'delete');

        $this->router->addNewRoute('GET', '\product', 'app\controller\ProductController', 'get');
        $this->router->addNewRoute('POST', '\product', 'app\controller\ProductController', 'post');
        $this->router->addNewRoute('PATCH', '\product', 'app\controller\ProductController', 'patch');
        $this->router->addNewRoute('DELETE', '\product', 'app\controller\ProductController', 'delete');

        $this->router->addNewRoute('GET', '\cart', 'app\controller\CartController', 'get');
        $this->router->addNewRoute('POST', '\cart', 'app\controller\CartController', 'post');
        $this->router->addNewRoute('PATCH', '\cart', 'app\controller\CartController', 'patch');
        $this->router->addNewRoute('DELETE', '\cart', 'app\controller\CartController', 'delete');

        $this->router->addNewRoute('GET', '\sale', 'app\controller\SaleController', 'get');
        $this->router->addNewRoute('POST', '\sale', 'app\controller\SaleController', 'post');
        $this->router->addNewRoute('PATCH', '\sale', 'app\controller\SaleController', 'patch');
        $this->router->addNewRoute('DELETE', '\sale', 'app\controller\SaleController', 'delete');
    }

    /**
     * @throws \Exception
     */
    public function run(): void
    {
        try {
            $this->initRoutes();
            $route = $this->router->getRequestRoute();

            if (!$route) {
                throw new \Exception('Rota não registrada.', 404);
            }

            $class = $route['resourceClass'];
            $method = $route['resourceMethod'];

            $resource = new $class();
            $response['data'] = $resource->$method();
            $responseCode = 200;
        } catch (\Exception $e) {
            $responseCode = $e->getCode();
            $response['error']['code'] = $e->getCode();
            $response['error']['message'] = $e->getMessage();
            $response['error']['file'] = $e->getFile();
            $response['error']['line'] = $e->getLine();
        } catch (Throwable $e) {
            $responseCode = 500;
            $response['error']['code'] = $e->getCode();
            $response['error']['message'] = $e->getMessage();
            $response['error']['file'] = $e->getFile();
            $response['error']['line'] = $e->getLine();
        }

        try {
            $this->defheader();
            http_response_code($responseCode);
            echo json_encode($response);
        } catch (Throwable $e) {
            http_response_code(500);
            die('Contate o supporte.');
        }
    }

    function defheader()
    {
        header('Content-Type: application/json');
        // header('Access-Control-Allow-Headers: X-Requested-With, Origin, Content-Type, X-CSRF-Token, Accept');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Allow-Credentials: true');
        // header('Access-Control-Max-Age: 86400');    // cache for 1 day
        // header('Cache-Control: public');
        header("Access-Control-Allow-Methods: GET, POST, PATCH, DELETE");
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            exit(0);
        }
    }
}