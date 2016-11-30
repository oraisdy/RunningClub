<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/30
 * Time: 10:37
 */

function sendMessage($DB, $sourceId, $destId, $mainId, $type,$date) {
    return $DB -> save('insert into message(sourceId,destId,mainId,type,createdAt) VALUES (?,?,?,?,?);', array(
        $sourceId, $destId, $mainId, $type, $date
    ));
}

function showMessages($DB, $destId) {
    return $DB->query('select * from message WHERE destId=:destId ORDER BY createdAt DESC ;', array(
        "destId"=>$destId
    ));
}
