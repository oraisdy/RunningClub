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
            if($this->sQuery     = $this->file_db->prepare($this->BuildParams($query,$parameters))){
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

    public function save($query, $params = null, $fetchmode = PDO::FETCH_ASSOC) {
        $query        = trim($query);
        $this->Init($query, $params);
        return $this->file_db->lastInsertId();
    }

    public function query($query, $params = null, $fetchmode = PDO::FETCH_ASSOC) {
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
        $this->sQuery->closeCursor();
        return $resultRow;
    }
}

date_default_timezone_set('PRC');
$TimeStamp = $_SERVER['REQUEST_TIME'];
$CurDate = date('Y-m-d H:i:s', $TimeStamp);
$DB = new DB();
//for($i=1;$i<=7;$i++){
//    for($j=0;$j<rand(5,200);$j++)
//    $Result = $DB->save('insert into event_participant(eventId,userId,joinAt) values(?,?,?);',
//        array($i,rand(5,3400),$CurDate));
//}

$d = new Datetime("2016-11-02 18:00:00") ;
    for ($i=0;$i<30;$i+=3) {
        for ($j=0;$j<100;$j++) {
            $Result = $DB->save('insert into record(startAt,endAt,updatedAt,distance,userId) values(?,?,?,?,?);',
                array($d->format("Y-m-d H:i:s"), $d->format("Y-m-d H:i:s"), $d->format("Y-m-d H:i:s"), rand(100, 3000), rand(1, 1000)));
        }
        $d = $d->modify("+1 day");
    }