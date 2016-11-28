<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //join group
    $InsertResult = $DB -> save('insert into group_member(userId, groupId, joinAt) values(?,?,?)',array(
        $CurUserID,
        $_POST['id'],
        $CurDate,
    ));
    $DB -> query('update `group` set memberCount=memberCount+1 WHERE id=:id;', array(
        'id' => $_POST['id']
    ));
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $ID   = intval($_GET['id']);
    $Group = $DB -> row('select * from `group` where id = :id;',array('id'=>$ID));

    $Creator = $DB -> row('select * from user where id= :id;',array('id'=>$Group['creatorId']));

    $Members = $DB -> query('select * from user WHERE id IN (?);',
        $DB -> column('select userId from group_member WHERE groupId=:groupId ORDER BY joinAt DESC limit 10;',array(
            'groupId' => $Group['id'],
        ))
    );

    $IsMember = $Group['creatorId']==$CurUserID;
    if (!$IsMember)
        foreach ($Members as $member){
            if ($member['id']==$CurUserID){
                $IsMember = true;break;
            }
        }



}

include("/view/group.php");

