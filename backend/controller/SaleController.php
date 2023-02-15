<?php

namespace app\controller;

use app\core\Controller;
use app\model\Cart;
use app\model\CartSale;
use app\model\Sale;

/**
 * @package app\controller
 */
class SaleController extends Controller
{

    public function __construct()
    {
        $this->model = new Sale();
    }

    public function post(): string
    {
        $this->model->loadData($this->getJSONBody());

        if ($this->model->validate() && $this->model->save()) {
            $this->model->id = $this->model->getLastSale();
            $cart = new Cart();
            if ($cart->closeCart($this->model->id)) {
                return 'Success';
            }
            return 'Error';
        }

        return 'Error';
    }
}