<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="/static/css/font-awesome.css">
    <link rel="stylesheet" href="/static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="/static/css/activity.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/submit.function.js"></script>
    <script type="text/javascript">var id = <?php echo $Activity['id']?>;</script>
  </head>
  <body>
    <?php include("/view/common/header.php");?>
    <section class="main">
      <ul class="detail_container">
        <li class="image_presentation">
          <ul class="thumbnails_presentation">
            <li><img class="thumbnail" src="/static/image/activity1.jpg" alt="" /></li>
            <li><img class="thumbnail" src="/static/image/activity1.jpg" alt="" /></li>
            <li><img class="thumbnail" src="/static/image/activity1.jpg" alt="" /></li>
          </ul>
          <div id="current_presentation">
            <p></p>
          </div>
        </li>
        <li class="text_detail">
          <ul>
            <li><h3><?php echo $Activity['title']?></h3></li>
            <li><span><?php echo $Activity['type']?>, </span><span><?php echo $Activity['location']?></span></li>
<!--            <li>距离活动开始还有<small> 15 </small>天<small> 1 </small>小时<small> 53 </small>分</li>-->
            <li><?php echo $Activity['startAt']?> 至 <?php echo $Activity['endAt']?></li>
            <br>
            <li class="participants_container">
              <div class="sponsor_img_container">
                <img class="sponsor_img" src="/static/image/avatar.jpg" alt="发起者" title="<?php echo $Sponsor['login'] ?>"/>
              </div>
              <div class="participant_img_container">
                <?php foreach ($Participates as $user){  ?>
                  <img class="participant_img" src="/static/image/avatar.jpg" alt="参与者" title="<?php echo $user['login'] ?>" />
                <?php } ?>

                <p>由<?php echo $Sponsor['login']?>发起，<?php echo count($Participates);?>人参与了活动，<a href="#rank">查看全部</a></p>
              </div>
            </li>
            <hr style="margin-right:0;">
            <li><div class="btn_container">
              <a class='btn' href="#" onclick="buttonSubmit(this, '/activity/join', '报名成功');">我要报名</a>
            </div>
              <div class="btn_container">
                <a class='btn' href="#" onclick="buttonSubmit(this, '报名成功');">邀请好友</a>
              </div></li>
          </ul>
        </li>
      </ul>
      <div class="description_container">
        <h4>活动介绍</h4>
        <p><?php echo $Activity['description']?></p>
      </div>
      <div class="result_container" id="rank">
        <h4>参与者排名</h4>
      </div>
    </section>
    <?php include("/view/common/footer.html");?>
  

  </body>
</html>
