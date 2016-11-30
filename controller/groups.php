<?php

include LanguagePath.'/groups.php';
require "/service/group.php";

if($_GET["action"] == 'my') {
    $Groups = getGroups($DB, $CurUserID);

} elseif ($_GET['action'] == 'all') {
    $Groups = $DB->query('select * from `group`;');
}


$Lang['Title'] = $Lang['Title_'.$_GET['action']];

include("/view/groups.php");
