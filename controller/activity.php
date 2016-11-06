<?php

$ID   = intval($_GET['id']);
$SelectResult = $DB->query('select * from event where id = :id;',array('id'=>$ID));
if(!empty($SelectResult))
    $Activity = $SelectResult[0];

$SponsorResult = $DB -> query('select * from user where id= :id;',array('id'=>$Activity['sponsorId']));
if(!empty($SponsorResult))
    $Sponsor = $SponsorResult[0];

$ParticipateResult = $DB -> query('select * from event_participant WHERE eventId=:id',array('id'=>$Activity['id']));
$ParticipatesCount = count($ParticipateResult);
$Participates = $DB -> query('select * from user where id in(?) limit 4;',$ParticipateResult);

//join activity
if($_SERVER['REQUEST_METHOD'] == 'POST') {

}

include("/view/activity.php");
