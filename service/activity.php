<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/30
 * Time: 0:01
 */

function joinActivity($DB, $userId,$eventId,$date){
    $InsertResult = $DB -> query('insert into event_participant(userId, eventId, joinAt) values(?,?,?)',array(
        $userId,
        $eventId,
        $date,
    ));
    $DB -> query('update `event` set participateCount=event.participateCount+1 WHERE id=:id;', array(
        'id' => $eventId
    ));
}

function getActivities($DB, $userId) {
    return $DB->query('select event.*,count(event_participant.userId) as cnt from event LEFT JOIN event_participant 
        ON event.id=event_participant.eventId WHERE event.id IN (?) and deletedAt is NULL GROUP BY event.id ORDER BY event.startAt DESC;',
        $DB -> column('select eventId from event_participant WHERE userId=:userId',array(
            'userId' => $userId,
        ))
    );
}