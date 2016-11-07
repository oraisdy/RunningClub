<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/7
 * Time: 19:42
 */

    LogOut();
    header('location: /');


    function LogOut()
    {
        global $CurUserID;
        SetCookies(array(
            'UserID' => '',
            'UserName' => '',
            'UserExpirationTime' => '',
        ), 1);
        $CurUserID = 0;
    }