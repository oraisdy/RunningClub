<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/30
 * Time: 0:01
 */

function joinGroup($DB, $userId,$groupId,$date) {
    $DB -> save('insert into group_member(userId, groupId, joinAt) values(?,?,?)',array(
        $userId,
        $groupId,
        $date,
    ));
    $DB -> query('update `group` set memberCount=memberCount+1 WHERE id=:id;', array(
        'id' => $groupId
    ));
}

function getGroups($DB, $userId){
    return $DB->query('select * from `group` where id IN (?);',
        $DB->column('select groupId from group_member where userId = :userId', array(
            "userId" => $userId
        ))
    );
}