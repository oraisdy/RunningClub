<?php

require("/data/PDO.class.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Email = $_POST['email'];
    $Content = $_POST['password'];

    $db = new DB();
    $Result = $db->query('insert into `user`(login,password,email,joinAt) values(?,?,?,?);',
        array("test6",$Content,$Email,"1327214268"));

    echo $Result;
}


include("/view/register.html");