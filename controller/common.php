<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/4
 * Time: 13:48
 */

$TimeStamp = $_SERVER['REQUEST_TIME'];

//读入config
include('/config/config.php');

//打开数据库连接
require("/data/PDO.class.php");
$DB = new DB();


//批量设置Cookie
function SetCookies($CookiesArray, $Expires = 0)
{
    global $TimeStamp, $Config;
    foreach ($CookiesArray as $key => $value) {
        if (!$Expires)
            setcookie($Config['CookiePrefix'] . $key, $value, 0, $Config['WebsitePath'] . '/', null, false, true);
        else
            setcookie($Config['CookiePrefix'] . $key, $value, $TimeStamp + 86400 * $Expires, $Config['WebsitePath'] . '/', null, false, true);
    }
}