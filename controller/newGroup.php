<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/4
 * Time: 22:42
 */


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Result = $DB->query('insert into `group`(name,description,creatorId,updatedAt) values(?,?,?,?);',
        array($_POST['name'],
            $_POST['description'],
            $CurUserID,
            $CurDate));
    echo $Result;
}

include("/view/newGroup.php");