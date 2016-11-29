<?php

$id = intval($_GET['id']);
$User = $DB -> row('select * from user where id=:id;',array("id"=>$id));

$IsMe = $id==$CurUserID;
$IsFollowing = $DB -> row('SELECT count(*) AS cnt FROM follow_relation WHERE userId=:userId AND followingId = :followingId',
    array('userId'=>$CurUserID, 'followingId'=>$id))['cnt'];
$IsFriend = $IsFollowing && $DB -> row('SELECT count(*) AS cnt FROM follow_relation WHERE userId=:userId AND followingId = :followingId',
    array('userId'=>$id, 'followingId'=>$CurUserID))['cnt'];

$Record = $DB -> row('select count(DISTINCT date(updatedAt)) as days,sum(distance) as distances from record WHERE userId=:userId',array('userId'=>$id));
$Record['distances'] = $Record['distances']/1000;
$Record['calories'] = $User['weight']*$Record['distances'];

$Groups = $DB->query('select * from `group` where id IN (?);',
    $DB->column('select groupId from group_member where userId = :userId', array(
        "userId" => $CurUserID,
    ))
);

$Recent = array_reverse($DB -> query('select DATE(updatedAt) as date, sum(distance) as distance from record WHERE userId = :userId GROUP BY date 
            ORDER BY date desc limit 7;', array('userId' => $id)));
$RecentDates =  array();
$RecentDistances = array();
foreach ($Recent as $List){
    array_push($RecentDates, explode(" ",$List['date'])[0]);
    array_push($RecentDistances, $List['distance']/1000);
};

$Activities = $DB->query('select * from event WHERE id in (?) ORDER BY startAt DESC;',
    $DB->column('select eventId from event_participant WHERE userId = :userId ;', array("userId"=>$id))
);

$Friends = $DB -> query('select * from user where id in (?);',
    $DB -> column('SELECT f1.followingId from follow_relation f1, follow_relation f2
      WHERE f1.userId = :id AND f1.followingId = f2.userId AND f2.followingId = f1.userId',
        array('id'=>$id))
);

include("/view/user.php");