<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/4
 * Time: 22:41
 */

$State="创  建";
if($_SERVER['REQUEST_METHOD']=='POST') {
    $DB -> query('insert into event(title,type,location,description,startAt,endAt,sponsorId) VALUES(?,?,?,?,?,?,?) ', array(
        $_POST['title'],
        $_POST['type'],
        $_POST['location'],
        $_POST['description'],
        $_POST['daterange']['startDate'],
        $_POST['daterange']['endDate'],
        $CurUserID
    ));
    echo "<br><br><br><br><br><br><br><br><br>".$_POST['description'];
    $State="发布成功";
    header('location:/activities/my');
}

include("/view/newActivity.php");