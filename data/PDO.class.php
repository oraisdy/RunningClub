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
        $this->file_db = new PDO('sqlite:rnclub.db');
    }


    private function Init($query, $parameters = "") {
        try {
            if($this->sQuery     = $this->file_db->prepare($query)){
                if (!empty($parameters)) {
                    if (array_key_exists(0, $parameters)) {     //序号型
                        $parametersType = true;
                    } else {
                        $parametersType = false;
                    }
                    foreach ($parameters as $column => $value) {
//                        echo $parametersType ? $column+1 : ":" . $column." ". $parameters[$column].'<br>';
                        $this->sQuery->bindParam($parametersType ? $column+1 : ":" . $column, $parameters[$column]);
                    }
                }
                $this->sQuery->execute();
                $this->queryCount++;
            } else {
                printf("Errormessage:\n");
                foreach($this->file_db->errorInfo() as $line)
                    printf("%s\n",$line);
            }



        } catch (PDOException $e) {
            die();
        }
    }

    private function BuildParams($query, $params = null)
    {
        if (!empty($params)) {
            $rawStatement = explode(" ", $query);
            foreach ($rawStatement as $value) {
                if (strtolower($value) == 'in') {
                    return str_replace("(?)", "(" . implode(",", array_fill(0, count($params), "?")) . ")", $query);
                }
            }
        }
        return $query;
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

    public function column($query, $params = null)
    {
        $this->Init($query, $params);
        $resultColumn = $this->sQuery->fetchAll(PDO::FETCH_COLUMN);
        //$this->rowCount = $this->sQuery->rowCount();
        //$this->columnCount = $this->sQuery->columnCount();
        $this->sQuery->closeCursor();
        return $resultColumn;
    }

    public function row($query, $params = null, $fetchmode = PDO::FETCH_ASSOC)
    {
        $this->Init($query, $params);
        $resultRow = $this->sQuery->fetch($fetchmode);
        //$this->rowCount = $this->sQuery->rowCount();
        //$this->columnCount = $this->sQuery->columnCount();
        $this->sQuery->closeCursor();
        return $resultRow;
    }
}
