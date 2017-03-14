<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand"><b>Running</b>Club</a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/u/<?php echo $CurUserID?>"><i class="fa fa-bullseye"></i> 运动记录</a></li>
                    <li><a href="/activities/my"><i class="fa fa-map-o"></i> 活动中心</a></li>
                    <li><a href="/groups/my"><i class="fa fa-comments"></i> 兴趣小组</a></li>
                </ul>
            </div>
            <div class="navbar-custom-menu">
                <?php if($CurUserID==null) echo
                '<ul class="nav navbar-nav">
                    <li><a href="/login">登录/创建账号</a></li>
                </ul>'; else include("nav_right.php");
                ?>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>