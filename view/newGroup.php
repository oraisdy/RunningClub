<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>小组 - 创建小组</title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/activities.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
  </head>
  <body>
    <?php include("/view/common/header.php");?>
    <div class="main">
      <div class="banner">
      </div>
      <div class="left">
        <ul class="sidenav">
          <li class="title"><h4>小组 GROUPS</h4></li>
          <hr>
          <li><a href="/groups/my">我参加的小组</a></li>
          <li><a href="/groups/all">所有小组</a></li>
          <li><a href="/group/new">创建小组</a></li>
        </ul>
      </div>
      <!-- right part begin -->
      <div class="right">
        <!-- group big start -->
        <div class="group-big">
          <h4>创建小组</h4>
          <form class="" action="/group/new" method="post">
            <div><label>小组名称：</label><input class="field" type="text" name="name" value="" placeholder=""></div>
            <div><label>小组描述：</label><textarea class="field" type="text" name="description" value="" placeholder=""></textarea></div>
            <input type="submit" class="btn" value="创  建">
          </form>
        </div><!-- big group end -->
      </div><!-- right part end -->
    </div>
    <?php
    include("/view/common/footer.html");
    ?>

  </body>
</html>
