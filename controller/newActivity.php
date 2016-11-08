<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/4
 * Time: 22:41
 */

include LanguagePath.'/newActivity.php';

$State="创  建";
if($_SERVER['REQUEST_METHOD']=='POST') {
    $State="发布中";
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

    if($_POST['ifJoin'])
        $JoinResult = $DB -> query('insert into event_participant(userId, eventId, joinAt) values(?,?,?)',array(
            $CurUserID,
            $EventId,
            $CurDate,
        ));


}

include("/view/newActivity.php");