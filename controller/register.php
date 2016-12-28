<?php


$Expires = 30;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Result = $DB->query('insert into `user`(login,password,email,joinAt,avatar_url) values(?,?,?,?,?);',
        array($_POST['login'],$_POST['password'],$_POST['email'],$CurDate,"/static/image/avatar7.jpg"));

    do {

        echo ($Result);

        if ($Result != 1) {
            break;
        }

        $DBUser = $DB->row("select * from user where email=:email", array("email" => $_POST['email']));

        $TemporaryUserExpirationTime = $Expires * 86400 + $TimeStamp;

        SetCookies(array(
            'UserID' => $DBUser['id'],
            'UserName' => $DBUser['login'],
            'UserExpirationTime' => $TemporaryUserExpirationTime,
        ), $Expires);

        header('location:/');

    } while (false);
}


include("./view/register.html");