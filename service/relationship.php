<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/29
 * Time: 23:53
 */

function getFriends($DB, $userId) {
    return $DB -> query('select * from user where id in (?);',
        $DB -> column('SELECT f1.followingId from follow_relation f1, follow_relation f2
      WHERE f1.userId = :id AND f1.followingId = f2.userId AND f2.followingId = f1.userId',
            array('id'=>$userId))
    );
}

function saveRelationship($DB,$userID, $followingId,$date) {
    $DB -> save('insert into follow_relation(userId, followingId, updatedAt) VALUES(?,?,?);
        ', array(
        $userID,
        $followingId,
        $date,
    ));
}