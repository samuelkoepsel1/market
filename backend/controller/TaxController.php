<?php

namespace app\controller;

use app\core\Controller;
use app\model\Tax;

/**
 * @package app\controller
 */
class TaxController extends Controller
{

    public function __construct()
    {
        $this->model = new Tax();
    }
}