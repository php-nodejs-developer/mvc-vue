<?php


namespace Mountains\Db;


use Mountains\Kernel\DBConnection;

class ClimbDb
{
    private $dbConnection;

    public function __construct(){
        $this->dbConnection = DbConnection::getInstance()->getConnection();
    }

    // добавление восхождения в таблицу
    public function addClimb($mountainId, $start, $end){
        $sql = "INSERT INTO tb_climbs (start, end, mountain_id) VALUE (:start_param, :end_param, :mountain_id_param)";

        $statement = $this->dbConnection->prepare($sql);
        return $statement->execute([
            'start_param' => $start,
            'end_param' => $end,
            'mountain_id_param' => $mountainId
        ]);
    }

    // все восхождения
    public function getAllClimbs(){
        $sql = "SELECT tb_climbs.start AS start, tb_climbs.end AS end, tb_climbs.id AS id,
                       tb_mountains.name AS mountain_name, tb_mountains.country AS mountain_country
                FROM tb_climbs, tb_mountains WHERE tb_mountains.id = tb_climbs.mountain_id";

        $statement = $this->dbConnection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}