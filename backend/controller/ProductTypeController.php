<?php

namespace app\controller;

use app\core\Controller;
use app\model\ProductType;

/**
 * @package app\controller
 */
class ProductTypeController extends Controller
{

    public function __construct()
    {
        $this->model = new ProductType();
    }
}