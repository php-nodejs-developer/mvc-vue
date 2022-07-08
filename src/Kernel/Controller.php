<?php


namespace Mountains\Kernel;


abstract class Controller
{
    protected function getIndex(){
        ob_start(); // буферизированный вывод
        require_once '../templates/main.html';
        $page = ob_get_contents();
        ob_clean();
        return $page;
    }

}