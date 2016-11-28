<?php

$id = intval($_GET['id']);
$User = $DB -> row('select * from user where id=:id;',array("id"=>$id));

$Record = $DB -> row('select count(*) as days,sum(distance) as distances from record WHERE userId=:userId',array('userId'=>$id));
$Record['distances'] = $Record['distances']/1000;
$Record['calories'] = $User['weight']*$Record['distances'];

$Activities = $DB->query('select * from event WHERE id in (?);',
    $DB->column('select eventId from event_participant WHERE userId = :userId', array("userId"=>$id))
);

$Activities = $DB->query('select * from event WHERE id in (?);',
    $DB->column('select eventId from event_participant WHERE userId = :userId', array("userId"=>$id))
);
//echo '<br><br><br><br><br><br><br><br>'.count($Activities);
include("/view/user.php");
