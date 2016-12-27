<?php
require(LanguagePath . 'login.php');

$Error = '';
$ErrorCode = 101000;
$UserName = '';
$ReturnUrl = isset($_SERVER['HTTP_REFERER']) ? htmlspecialchars($_SERVER["HTTP_REFERER"]) : '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Email = $_POST['email'];
    $Password = $_POST['password'];
//    $Expires    = min(intval(Request('Post', 'Expires', 30)), 30); //最多保持登陆30天
    $Expires = 30;

    do {
        if (!$Email || !$Password) {
            $Error = $Lang['Forms_Can_Not_Be_Empty'];
            $ErrorCode = 101001;
            break;
        }


        $DBUser = $DB->row("select * from user where email=:email", array("email" => $Email));
        if (!$DBUser) {
            $Error = $Lang['User_Does_Not_Exist'];
            $ErrorCode = 101003;
            break;
        }


        if ($DBUser['password'] != $Password) {
            $Error = $Lang['Password_Error'];
            $ErrorCode = 101004;
            break;
        }


        $TemporaryUserExpirationTime = $Expires * 86400 + $TimeStamp;

        SetCookies(array(
            'UserID' => $DBUser['id'],
            'UserName' => $DBUser['login'],
            'UserExpirationTime' => $TemporaryUserExpirationTime,
        ), $Expires);

        header('location:/');

    } while (false);
}

//$DB->CloseConnection();


include("./view/login.html");

