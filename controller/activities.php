<?php




$Activities = $DB->query('select * from event;');


include("/view/activities.php");