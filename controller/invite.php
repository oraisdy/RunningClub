<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/29
 * Time: 23:50
 */

require "./service/relationship.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //show friends list
    $Friends = (getFriends($DB,$CurUserID));

//    echo '<br><br><br><br><br>'.$Friends;
    include("/view/friends.php");

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    echo '<br><br><br><br><br>'.$_POST['friendId']." ".$_POST['eventId'];
    //invite
   echo sendMessage($DB, $CurUserID, $_POST['friendId'], $_POST['eventId'], '邀请',$CurDate);

}