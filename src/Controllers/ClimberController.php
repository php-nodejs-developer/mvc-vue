<?php


namespace Mountains\Controllers;


use Mountains\Db\ClimberDb;
use Mountains\Kernel\Controller;

class ClimberController extends Controller
{
    private $climberDb;

    public function __construct(){
        $this->climberDb = new ClimberDb();
    }

    public function addClimber(){
        $name = $_POST['name'];
        $address = $_POST['address'];

        $result = $this->climberDb->addClimber($name, $address);
        if ($result) echo json_encode(['message' => 'SUCCESS', 'id'=>$result]);
        else echo json_encode(['message' => 'ERROR', 'id'=>null]);
    }
}