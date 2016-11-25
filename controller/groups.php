<?php

include LanguagePath.'/groups.php';

if($_GET["action"] == 'my') {
    $Groups = $DB->query('select * from `group` where id IN (?);',
        $DB->column('select * from group_member where userId = :userId', array(
            "userId" => $CurUserID,
        ))
        );

} elseif ($_GET['action'] == 'all') {
    $Groups = $DB->query('select * from `group`;');
}


$Lang['Title'] = $Lang['Title_'.$_GET['action']];
$GroupsCount = count($Groups);

include("/view/groups.php");
