<?php

namespace app\controller;

use app\core\Controller;
use app\model\Cart;

/**
 * @package app\controller
 */
class CartController extends Controller
{

    public function __construct()
    {
        $this->model = new Cart();
    }
}