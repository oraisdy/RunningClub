<?php



$User = $DB -> row('select * from user where id=:id;',array("id"=>$CurUserID));


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DB->save('update `user` set login=:login, sex=:sex, description=:discription, weight=:weight WHERE id=:id;',
        array($_POST['login'],
            $_POST['sex'],
            $_POST['description'],
            $_POST['weight'],
            $CurUserID));
    header('location: /u/'.$CurUserID);

} elseif($_GET['action'] == 'modify') {

    include("/view/profile.php");

} elseif ($_GET['action'] == 'presentation') {
    include("/view/presentation.php");
}

