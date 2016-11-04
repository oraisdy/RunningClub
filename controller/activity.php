<?php

$ID   = intval($_GET['id']);
$SelectResult = $DB->query('select * from event where id = :id;',array('id'=>$ID));
if(!empty($SelectResult))
    $Activity = $SelectResult[0];

include("/view/activity.php");
