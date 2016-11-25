<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/25
 * Time: 14:28
 */

$EventId = $DB -> save('insert into follow_relation(userId, followingId, updatedAt) VALUES(?,?,?);
        ', array(
    $CurUserID,
    $_POST['id'],
    $CurDate,
));