<?php

$id = intval($_GET['id']);
$User = $DB -> row('select * from user where id=:id;',array("id"=>$id));

$IsMe = $id==$CurUserID;
$IsFollowing = $DB -> row('SELECT count(*) AS cnt FROM follow_relation WHERE userId=:userId AND followingId = :followingId',
    array('userId'=>$CurUserID, 'followingId'=>$id))['cnt'];
$IsFriend = $IsFollowing && $DB -> row('SELECT count(*) AS cnt FROM follow_relation WHERE userId=:userId AND followingId = :followingId',
    array('userId'=>$id, 'followingId'=>$CurUserID))['cnt'];

$Record = $DB -> row('select count(*) as days,sum(distance) as distances from record WHERE userId=:userId',array('userId'=>$id));
$Record['distances'] = $Record['distances']/1000;
$Record['calories'] = $User['weight']*$Record['distances'];


$Recent = array_reverse($DB -> query('select updatedAt as date, distance from record WHERE userId = :userId 
            ORDER BY updatedAt desc limit 7;', array('userId' => $id)));
$RecentDates =  array();
$RecentDistances = array();
foreach ($Recent as $List){
    array_push($RecentDates, explode(" ",$List['date'])[0]);
    array_push($RecentDistances, $List['distance']/1000);
};


$Activities = $DB->query('select * from event WHERE id in (?) ORDER BY startAt DESC;',
    $DB->column('select eventId from event_participant WHERE userId = :userId ;', array("userId"=>$id))
);



include("/view/user.php");