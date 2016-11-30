<header>
    <ul class="topNav" id="firstNav">
        <li class="nav-left"><a href="/index">RUNNING CLUB</a></li>
        <li class="nav-left"><a href="#">帮助</a></li>
        <li class="nav-right"><a href="https://github.com/oraisdy/RunningClub">联系我们</a></li>
        <?php echo $CurUserID==null?
            '<li class="nav-right"><a href="/login">登录/创建账号</a></li>':
            '<li class="nav-right"><a href="/profile/modify">'.$CurUserName.'</a></li>
            <li class="nav-right"><a href="#">'.count($Messages).'条新消息</a></li>'
        ?>


    </ul>
    <ul class="topNav" id="secondNav">
        <li class="nav-left"><img class="logo" src="../static/image/logo.png" alt="" /></li>
        <li><a href="/">首页</a></li>
        <li><a href="/u/<?php echo $CurUserID?>">运动</a></li>
        <li><a href="/activities/my">活动</a></li>
        <li><a href="/groups/my">小组</a></li>
    </ul>
</header>