<ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->
    <li class="dropdown messages-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php echo count($Messages);?></span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">你有<?php echo count($Messages);?>条新消息</li>
            <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <!-- User Image -->
                                <img src=<?php echo $CurUser['avatar_url'];?> class="img-circle" alt="User Image">
                            </div>
                            <!-- Message title and timestamp -->
                            <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <!-- The message -->
                            <p>test</p>
                        </a>
                    </li>
                    <!-- end message -->
                </ul>
                <!-- /.menu -->
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
    </li>
    <!-- /.messages-menu -->

    <!-- User Account Menu -->
    <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src=<?php echo $CurUser['avatar_url'];?> class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"><?php echo $CurUserName;?></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="/profile/modify">编辑资料</a></li>
            <li><a href="#">好友管理</a></li>
            <li class="divider"></li>
            <li><a href="/logout">退出登录</a></li>
        </ul>
    </li>
</ul>