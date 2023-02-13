<?php

namespace app\controller;

use app\core\Controller;
use app\model\Product;

/**
 * @package app\controller
 */
class ProductController extends Controller
{

    public function __construct()
    {
        $this->model = new Product();
    }
}