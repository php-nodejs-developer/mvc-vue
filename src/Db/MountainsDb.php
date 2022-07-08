<?php
namespace Mountains\Db;

use Mountains\Kernel\DBConnection;
use PDO;

class MountainsDb
{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = DbConnection::getInstance()->getConnection();
    }

    public function getAll(){
        $sql = "SELECT * FROM tb_mountains;";
        $statement = $this->dbConnection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addToTable($name, $country){
        $sql = "INSERT INTO tb_mountains (name, country) VALUE (:name_param, :country_param)";

        $statement = $this->dbConnection->prepare($sql);
        return $statement->execute([
            'name_param' => $name,
            'country_param' => $country
        ]);
    }

    public function editMountain($name, $country){
        $sql = "UPDATE tb_mountains SET country = :country_param WHERE name = :name_param;";
        $statement = $this->dbConnection->prepare($sql);
        return $statement->execute([
            'name_param' => $name,
            'country_param' => $country
        ]);
    }
}