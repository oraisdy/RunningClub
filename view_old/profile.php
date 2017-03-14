<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>资料 - <?php echo $User['login'];?></title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/user.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/submit.function.js"></script>
    <script type="text/javascript" src="../static/js/library/echarts.min.js"></script>
    <script type="text/javascript">var id = <?php echo $User['id']?>;</script>
</head>
<body>
<?php include("common/header.php"); ?>
<div class="banner">
</div>
<div class="main">
    <div class="left">
        <img class="avatar" src=<?php echo $User['avatar_url'];?> alt="" style="width:200px; height:200px"/>
        <ul class="sidenav">
            <li class="title"><h4 class="nickname"><?php echo $User['login'];?></h4></li>
            <hr>
            <li><a href="/profile/modify">修改资料</a></li>
            <li><a href="/profile/presentation">修改展示内容</a></li>
            <li><a href="/logout">登出</a></li>
        </ul>


    </div>
    <div class="right">
        <div class="group-big">
            <h4>修改我的资料</h4>
            <div class="form_container">
                <form action="/user/modify" method="post">
                    <div><label>邮箱：</label><input class="field" type="email" readonly="readonly" placeholder="<?php echo $User['email'];?>（不可更改）"></div>
                    <div><label>昵称：</label><input class="field" type="text" name="login" value='<?php echo $User['login'];?>' placeholder='<?php echo $User['login'];?>'></div>
                    <div><label>性别：</label>男<input type="radio" <?php if($User['sex']=='男') echo 'checked';?> name="sex" value="男" />
                        女<input type="radio" <?php if($User['sex']=='女') echo 'checked';?> name="sex" value="女" ></div>
                    <div><label>体重：</label><input class="field" type="number" name="weight" value='<?php echo $User['weight'];?>' placeholder='<?php echo $User['weight'];?>'><label>kg</label></div>
                    <div><label>宣言：</label><textarea type="text" name="description" value='<?php echo $User['description'];?>' placeholder='<?php echo $User['description'];?>'></textarea></div>
                    <input type="submit" class="btn" value="保   存">
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php include("common/footer.php"); ?>
</body>

</html>
