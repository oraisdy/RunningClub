<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>活动 - <?php echo $Lang['Title'] ?></title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/activities.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/submit.function.js"></script>
  </head>
  <body>
    <?php include("./view/common/header.php");?>
    <div class="main">
      <div class="banner">
      </div>
      <div class="left">
        <ul class="sidenav">
          <li class="title"><h4>活动 ACTIVITIES</h4></li>
          <hr>
          <li><a href="/activities/my">我参与的活动</a></li>
          <li><a href="/activities/ongoing">进行中的活动</a></li>
          <li><a href="/activities/due">结束的活动</a></li>
          <li><a href="/activities/submit">我发布的活动</a></li>
          <li><a href="/activities/new">创建活动</a></li>
        </ul>
      </div>
      <div class="right">
        <div class="group-big">
          <h4><?php echo $Lang['Title'] ?><small>(<?php echo count($Activities); ?>)</small></h4>
          <?php
            foreach($Activities as $activity){
          ?>
              <!-- middle group start -->
              <div class="group-middle">
                <div class="img_container">
                  <a href="/a/<?php echo $activity['id']?>"><img src="../static/image/activity1.jpg" alt="" /></a>
                </div>
                <div class="text_container">
                  <a href="/a/<?php echo $activity['id']?>"><h4><?php echo $activity['title']?>
                      <?php if($IsSponsor) { ?><small><a href="/activities/new">修改</a></small><small> |</small><small>
                        <a href="#" onclick="buttonSubmit(this, <?php echo $activity['id']?>,'/activity/delete', '已删除');">删除</a></small><?php }?></h4></a>
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
                    <li><?php echo $activity['cnt'];?> 人</li>
                  </div>
                  <div class="col_container">
                    <li><i class="fa fa-calendar fa-border" aria-hidden="true"></i></li>
                    <li><?php echo $activity['startAt'];?></li>
                  </div>
                </div>
              </div>
              <!-- middle group end -->
          <?php
            }
          ?>

      </div>
    </div>
    <?php include("./view/common/footer.php");?>
  </body>
</html>
