<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/3
 * Time: 22:10
 */
class DB {

    private $file_db;
    private $sQuery;
    public $queryCount = 0;

    public function __construct() {
        $this->file_db = new PDO('sqlite:../rnclub.db');
    }


    private function Init($query, $parameters = "") {
        try {
            $this->sQuery     = $this->file_db->prepare($query);
            echo $query.'<br>';
            if (!empty($parameters)) {
                if (array_key_exists(0, $parameters)) {     //序号型
                    $parametersType = true;
                    echo "true";
                } else {
                    $parametersType = false;
                }
                foreach ($parameters as $column => $value) {
                    echo ($parametersType ? $column+1 : ":" . $column)." ".$parameters[$column].'<br>';
                    $this->sQuery->bindParam($parametersType ? $column+1 : ":" . $column, $parameters[$column]);
                }
            }

            $this->sQuery->execute();
            $this->queryCount++;
        }
        catch (PDOException $e) {
            die();
        }
    }

    public function query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $query        = trim($query);
        $rawStatement = explode(" ", $query);
        $this->Init($query, $params);
        $statement = strtolower($rawStatement[0]);
        if ($statement === 'select' || $statement === 'show') {
            return $this->sQuery->fetchAll($fetchmode);
        } elseif ($statement === 'insert' || $statement === 'update' || $statement === 'delete') {
            return $this->sQuery->rowCount();
        } else {
            return NULL;
        }
    }
}
