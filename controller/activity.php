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

    $Participates = $DB -> query('select * from user WHERE id IN (?);',
        $DB -> column('select userId from event_participant WHERE eventId=:eventId ORDER BY joinAt DESC limit 4;',array(
            'eventId' => $Activity['id'],
        ))
    );

    $IsParticipate = false;
    foreach ($Participates as $member){
        if ($member['id']==$CurUserID){
            $IsParticipate = true;break;
        }
    }

    $Rank = $DB -> query("select user.id,user.login, sum(distance) as score from record LEFT JOIN user on record.userId = user.id 
        where userId in (?) AND updatedAt BETWEEN '".$Activity['startAt']."' and '".$Activity['endAt']."' group by userId order by score desc;",
        $DB -> column('select userId from event_participant WHERE eventId=:eventId;',array(
            'eventId' => $Activity['id'],
            ))
    );
    $Scores = array();
    $Users = array();

    foreach ($Rank as $item) {
        array_push($Scores,$item['score']);
        array_push($Users,$item['login']);
    }
    $Scores = array_reverse($Scores);
    $Users = array_reverse($Users);


}

include("/view/activity.php");

echo $Activity['startAt']." ".$Activity['endAt']." ".json_encode($Rank);
