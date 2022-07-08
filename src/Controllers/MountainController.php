<?php


namespace Mountains\Controllers;


use Mountains\Db\MountainsDb;

class MountainController
{
    private $mountainDB;

    public function __construct(){
        $this->mountainDB = new MountainsDb();
    }

    public function getMountains(){
        echo json_encode($this->mountainDB->getAll());
    }
}