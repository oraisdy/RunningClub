<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/4
 * Time: 13:48
 */


require "./service/message.php";

date_default_timezone_set('PRC');
$TimeStamp = $_SERVER['REQUEST_TIME'];
$CurDate = date('Y-m-d H:i:s', $TimeStamp);

//读入config
include('./config/config.php');

//打开数据库连接
require("./data/PDO.class.php");
$DB = new DB();

$CurUserID             = intval(GetCookie('UserID'));
$CurUserName             = GetCookie('UserName');

//个人消息
$Messages = showMessages($DB,$CurUserID);
//$Messages = $Messages==null?array():$Messages;

//批量设置Cookie
function SetCookies($CookiesArray, $Expires = 0)
{
    global $TimeStamp, $Config;
    foreach ($CookiesArray as $key => $value) {
        if (!$Expires)
            setcookie( $key, $value, 0, '/', null, false, true);
        else
            setcookie( $key, $value, $TimeStamp + 86400 * $Expires, '/', null, false, true);
    }
}

//获取Cookie
function GetCookie($Key, $DefaultValue = false)
{
    global $Config, $IsApp;
    if (!$IsApp) {
        if (!empty($_COOKIE[$Key])) {
            return $_COOKIE[$Key];
        } else if ($DefaultValue) {
            SetCookies(array(
                $Key => $DefaultValue
            ));
            return $DefaultValue;
        }
    } else {
        return Request("Request", "Auth" . $Key, $DefaultValue);
    }
    return false;
}