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
          <h4><?php echo $Lang['Title']; ?><small>(<?php echo $GroupsCount?>)</small></h4>

          <?php foreach ($Groups as $group) {?>
          <!-- small group start -->
          <div class="group-small">
            <div class="img_container">
              <a href="/g/<?php echo $group['id'];?>"><img src=<?php echo $group['avatar_url'];?> alt="<?php echo $group['name'];?>" /></a>
            </div>
            <a href="/g/<?php echo $group['id']?>"><?php echo $group['name']?></a>
             <p class="icon_line">
               <i class="fa fa-child fa-blue" aria-hidden="true">4</i>
               <i class="fa fa-comments-o" aria-hidden="true">124</i>
             </p>
          </div><!-- small group end -->
          <?php }?>
        </div><!-- big group end -->
      </div><!-- right part end -->
    </div>
    <?php
    include("/view/common/footer.html");
    ?>
  </body>
</html>
