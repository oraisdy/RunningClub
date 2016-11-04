<?php


$Groups = $DB->query('select * from `group`;');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Result = $DB->query('insert into `group`(name,description,creatorId,updatedAt) values(?,?,?,?);',
        array($_POST['name'],$_POST['description'],1,"1327214268"));
    echo $Result;
}


include("/view/groups.php");
