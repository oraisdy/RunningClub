<header>
    <ul class="topNav" id="firstNav">
        <li class="nav-left"><a href="index">RUNNING CLUB</a></li>
        <li class="nav-left"><a href="#">帮助</a></li>
        <li class="nav-right"><a href="/">联系我们</a></li>
        <?php echo $CurUserID==null?
            '<li class="nav-right"><a href="/login">登录/创建账号</a></li>':
            '<li class="nav-right"><a href="/logout">'.$CurUserName.'</a></li>'
        ?>

    </ul>
    <ul class="topNav" id="secondNav">
        <li class="nav-left"><img class="logo" src="../static/image/logo.png" alt="" /></li>
        <li><a href="/">首页</a></li>
        <li><a href="/user">运动</a></li>
        <li><a href="/activities">活动</a></li>
        <li><a href="/groups">小组</a></li>
    </ul>
</header>