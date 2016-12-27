<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/4
 * Time: 22:41
 */

require "./service/activity.php";

include LanguagePath.'/newActivity.php';

//$State="发布";
if($_SERVER['REQUEST_METHOD']=='POST') {
//    $State="发布中";
    $EventId = $DB -> save('insert into event(title,type,location,description,startAt,endAt,sponsorId) VALUES(?,?,?,?,?,?,?);
        ', array(
        $_POST['title'],
        $_POST['type'],
        $_POST['location'],
        $_POST['description'],
        explode($Lang['Separator'], $_POST['daterange'])[0],
        explode($Lang['Separator'], $_POST['daterange'])[1],
        $CurUserID
    ));

    if(array_key_exists('ifJoin',$_POST)) {
        joinActivity($DB, $CurUserID, $EventId, $CurDate);
    }

//    header('location: /activities/submit');
}
else {
    include("./view/newActivity.php");
}