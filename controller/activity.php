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
    $SelectResult = $DB->query('select * from event where id = :id;',array('id'=>$ID));
    if(!empty($SelectResult))
        $Activity = $SelectResult[0];

    $SponsorResult = $DB -> query('select * from user where id= :id;',array('id'=>$Activity['sponsorId']));
    if(!empty($SponsorResult))
        $Sponsor = $SponsorResult[0];

    $ParticipateResult = $DB -> column('select userId from event_participant WHERE eventId=:id',array('id'=>$Activity['id']));
    $ParticipatesCount = count($ParticipateResult);
    $Participates = $DB -> query('select * from user where id in(?) limit 4;',$ParticipateResult);

}

include("/view/activity.php");
