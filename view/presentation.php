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

        <!-- group big start -->
        <div class="group-big">
            <h4><?php echo $User['login']?>的运动记录<small><a href="#"> 所有人可见</a></small></h4>
        </div><!-- big group end -->

        <!-- group big start -->
        <div class="group-big">
            <h4><?php echo $User['login']?>的好友<small><a href="#"> 所有人可见</a></small></h4>
        </div><!-- big group ends -->

        <!-- group big start -->
        <div class="group-big">
            <h4><?php echo $User['login']?>的小组<small><a href="#"> 所有人可见</a></small></h4>

        </div><!-- big group ends -->

        <!-- group big start -->
        <div class="group-big">
            <h4><?php echo $User['login']?>参与的活动<small><a>所有人可见</a></small></h4>
        </div><!-- big group end -->
    </div>
</div>
</div>
<?php include("common/footer.php"); ?>

</body>

</html>
