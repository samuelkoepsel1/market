<?php

namespace app\controller;

use app\core\Controller;
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
}