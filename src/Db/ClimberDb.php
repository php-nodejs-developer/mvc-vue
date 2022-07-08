<?php

namespace Mountains\Db;


use Mountains\Kernel\DBConnection;

class ClimberDb
{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = DbConnection::getInstance()->getConnection();
    }

    // добавление альпиниста в таблицу
    public function addClimber($name, $address){
        $sql = "INSERT INTO tb_climbers (name, address) VALUE (:name_param, :address_param)";

        $statement = $this->dbConnection->prepare($sql);
        $statement->execute([
            'name_param' => $name,
            'address_param' => $address
        ]);
        return $this->dbConnection->lastInsertId();
    }
}