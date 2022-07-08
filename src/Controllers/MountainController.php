<?php


namespace Mountains\Controllers;


use Mountains\Db\MountainsDb;

class MountainController
{
    private $mountainDB;

    public function __construct(){
        $this->mountainDB = new MountainsDb();
    }

}