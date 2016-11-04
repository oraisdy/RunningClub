<?php
/**
 * Created by PhpStorm.
 * User: Dora
 * Date: 2016/11/3
 * Time: 22:04
 */

    require('/PDO.class.php');

    $db = new DB();


//    $PostsArray = $db->query('select * from user WHERE id=? and login=?;',array("1","123"));
//    $PostsArray = $db->query('select * from user WHERE id=:id and login=:login;',array("id"=>"1","login"=>"123"));



$PostsArray = $db->query('insert into `user`(login,password,email,joinAt) values(?,?,?,?);',
    array("test3","test","546338494","1327214268"));

echo $PostsArray;
    foreach ($PostsArray as $item) {
        echo $item;
    }