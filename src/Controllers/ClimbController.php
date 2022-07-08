<?php


namespace Mountains\Controllers;


use Mountains\Db\ClimbDb;
use Mountains\Db\MountainsDb;

class ClimbController
{
    private $climbDb;
    private $mountainDb;

    public function __construct(){
        $this->climbDb = new ClimbDb();
        $this->mountainDb = new MountainsDb();
    }

    public function addClimb(){
        $start = $_POST['start'];
        $end = $_POST['end'];
        $mountainId = $_POST['mountain_id'];

        if ($this->climbDb->addClimb($mountainId, $start, $end)) echo 'SUCCESS';
        else echo 'ERROR';
    }

    public function getAllClimbs(){
        echo json_encode($this->climbDb->getAllClimbs());
    }
}