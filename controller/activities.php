<?php


if($_GET['action'] == 'my') {
    $Activities = $DB->query('select * from event WHERE id IN (?);',
        $DB -> column('select eventId from event_participant WHERE userId=:userId',array(
            'userId' => $CurUserID,
        ))
    );
} elseif ($_GET['action'] == 'ongoing') {

    $Activities = $DB->query('select * from event WHERE endAt > :nowDate', array(
        'nowDate' => date('Y-m-d H:i:s', $TimeStamp)
    ));
} elseif ($_GET['action'] == 'due') {

    $Activities = $DB->query('select * from event WHERE endAt < :nowDate', array(
        'nowDate' => date('Y-m-d H:i:s', $TimeStamp)
    ));
}




include("/view/activities.php");