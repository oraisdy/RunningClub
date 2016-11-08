<?php

include LanguagePath.'/activities.php';

if($_GET['action'] == 'my') {

    $Activities = $DB->query('select * from event WHERE id IN (?);',
        $DB -> column('select eventId from event_participant WHERE userId=:userId',array(
            'userId' => $CurUserID,
        ))
    );

} elseif ($_GET['action'] == 'ongoing') {

    $Activities = $DB->query('select * from event WHERE endAt > :nowDate', array(
        'nowDate' => $CurDate
    ));

} elseif ($_GET['action'] == 'due') {

    $Activities = $DB->query('select * from event WHERE endAt < :nowDate', array(
        'nowDate' => $CurDate
    ));

}

$Lang['Title'] = $Lang['Title_'.$_GET['action']];
$ActivitiesCount = count($Activities);

//echo '<br><br><br><br><br><br><br>'.$Lang['Title'];
include("/view/activities.php");