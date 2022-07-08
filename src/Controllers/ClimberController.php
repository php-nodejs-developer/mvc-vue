<?php
namespace Mountains\Controllers;

use Mountains\Db\ClimberDb;
use Mountains\Kernel\Controller;
use Mountains\Services\YandexMail;


class ClimberController extends Controller
{
    private $climberDb;

    public function __construct(){
        $this->climberDb = new ClimberDb();
    }

    public function addClimber(){
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];

        $climberId = $this->climberDb->addClimber($name, $address);

        if ($climberId) {
            $yandexMail = new YandexMail($email, $name, $climberId);
            if ($yandexMail->sentEmail()) echo json_encode(['message' => 'SUCCESS', 'id' => $climberId, 'sent' => true]);
            else echo json_encode(['message' => 'SUCCESS', 'id' => $climberId, 'sent' => false]);
        } else {
            echo json_encode(['message' => 'ERROR', 'id' => null]);
        }
    }
}