<?php

include LanguagePath.'/activities.php';


if($_GET['action'] == 'my') {

    $Activities = $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
        ON event.id=event_participant.eventId WHERE event.id IN (?) GROUP BY event.id ORDER BY event.startAt DESC;',
        $DB -> column('select eventId from event_participant WHERE userId=:userId',array(
            'userId' => $CurUserID,
        ))
    );

} elseif ($_GET['action'] == 'ongoing') {

    $Activities = $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
      ON event.id=event_participant.eventId WHERE endAt > :nowDate GROUP BY event.id ORDER BY event.startAt DESC;;', array(
        'nowDate' => $CurDate
    ));

} elseif ($_GET['action'] == 'due') {

    $Activities = $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
      ON event.id=event_participant.eventId WHERE endAt < :nowDate GROUP BY event.id ORDER BY event.startAt DESC;;', array(
        'nowDate' => $CurDate
    ));

}


$Lang['Title'] = $Lang['Title_'.$_GET['action']];
//$ActivitiesCount = count($Activities);


include("/view/activities.php");