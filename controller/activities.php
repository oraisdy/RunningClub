<?php

include LanguagePath.'/activities.php';
require "/service/activity.php";


$IsSponsor = false;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //delete
    $DB->query('update event set deletedAt=:dt WHERE id=:id ;', array(
        "id"=>$_POST['id'],"dt"=>$CurDate
    ));

} if($_GET['action'] == 'my') {

    $Activities = getActivities( $DB, $CurUserID );

} elseif ($_GET['action'] == 'ongoing') {

    $Activities = $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
      ON event.id=event_participant.eventId WHERE endAt > :nowDate and deletedAt is NULL GROUP BY event.id ORDER BY event.startAt DESC;;', array(
        'nowDate' => $CurDate
    ));

} elseif ($_GET['action'] == 'due') {

    $Activities = $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
      ON event.id=event_participant.eventId WHERE endAt < :nowDate and deletedAt is NULL GROUP BY event.id ORDER BY event.startAt DESC;;', array(
        'nowDate' => $CurDate
    ));

} elseif ($_GET['action'] == 'submit') {

    $Activities = $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
        ON event.id=event_participant.eventId WHERE sponsorId=:userId and deletedAt is NULL GROUP BY event.id ORDER BY event.startAt DESC;',
        array(
            'userId' => $CurUserID,
        )
    );

    $IsSponsor = true;

}


$Lang['Title'] = $Lang['Title_'.$_GET['action']];
//$ActivitiesCount = count($Activities);


include("/view/activities.php");