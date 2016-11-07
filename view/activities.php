<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/activities.css" media="screen" title="no title">
  </head>
  <body>
    <?php include("/view/common/header.php");?>
    <div class="main">
      <div class="banner">
      </div>
      <div class="left">
        <ul class="sidenav">
          <li class="title"><h4>活动 ACTIVITIES</h4></li>
          <hr>
          <li><a href="#">我参与的活动</a></li>
          <li><a href="#">进行中的活动</a></li>
          <li><a href="#">结束的活动</a></li>
          <li><a href="/activity/new">创建活动</a></li>
        </ul>
      </div>
      <div class="right">
        <div class="group-big">
          <h4>我参与的活动<small>(2)</small></h4>
          <?php
            foreach($Activities as $activity){
          ?>
              <!-- middle group start -->
              <div class="group-middle">
                <div class="img_container">
                  <a href="/a/<?php echo $activity['id']?>"><img src="../static/image/activity1.jpg" alt="" /></a>
                </div>
                <div class="text_container">
                  <a href="/a/<?php echo $activity['id']?>"><h4><?php echo $activity['title']?></h4></a>
                  <div class="col_container">
                    <li><i class="fa fa-hashtag fa-border" aria-hidden="true"></i></li>
                    <li><?php echo $activity['type']?></li>
                  </div>
                  <div class="col_container">
                    <li><i class="fa fa-location-arrow fa-border" aria-hidden="true"></i></li>
                    <li><?php echo $activity['location']?></li>
                  </div>
                  <div class="col_container">
                    <li><i class="fa fa-users fa-border" aria-hidden="true"></i></li>
                    <li>15 人</li>
                  </div>
                  <div class="col_container">
                    <li><i class="fa fa-calendar fa-border" aria-hidden="true"></i></li>
                    <li>15 天 1 小时 53分</li>
                  </div>
                </div>
              </div>
              <!-- middle group end -->
          <?php
            }
          ?>

      </div>
    </div>
    <?php include("/view/common/footer.html");?>
  </body>
</html>
