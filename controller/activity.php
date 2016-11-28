<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //join activity
    $InsertResult = $DB -> query('insert into event_participant(userId, eventId, joinAt) values(?,?,?)',array(
         $CurUserID,
        $_POST['id'],
        $CurDate,
    ));
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $ID   = intval($_GET['id']);
    $Activity = $DB -> row('select * from event where id = :id;',array('id'=>$ID));

    $Sponsor = $DB -> row('select * from user where id= :id;',array('id'=>$Activity['sponsorId']));

    $Participates = $DB->query('select * from user WHERE id IN (?);',
        $DB -> column('select userId from event_participant WHERE eventId=:eventId',array(
            'eventId' => $Activity['id'],
        ))
    );
}

include("/view/activity.php");
