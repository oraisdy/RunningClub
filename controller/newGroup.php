<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/4
 * Time: 22:42
 */

require "./service/group.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $GroupId = $DB->save('insert into `group`(name,description,creatorId,updatedAt) values(?,?,?,?);',
        array($_POST['name'],
            $_POST['description'],
            $CurUserID,
            $CurDate));
    joinGroup($DB, $CurUserID, $GroupId, $CurDate);

    header('location: /groups/my');
}

include("./view/newGroup.php");