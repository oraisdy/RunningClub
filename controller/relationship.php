<?php
/**
 * Created by PhpStorm.
 * User: st0001
 * Date: 2016/11/25
 * Time: 14:28
 */


require "./service/relationship.php";

$RelationId = saveRelationship($DB, $CurUserID, $_POST['id'], $CurDate);
//saveMessage($DB, $CurUserID, $_POST['id'], $RelationId, "关注", $CurDate);