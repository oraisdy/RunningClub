<?php




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Result = $DB->query('insert into `user`(login,password,email,joinAt) values(?,?,?,?);',
        array($_POST['login'],$_POST['password'],$_POST['email'],$CurDate));

    echo $Result;
}


include("./view/register.html");