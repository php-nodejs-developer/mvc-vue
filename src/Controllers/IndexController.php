<?php
namespace Mountains\Controllers;

use Mountains\Kernel\Controller;

class IndexController extends Controller
{
    public function index(){
        echo $this->getIndex();
    }
}