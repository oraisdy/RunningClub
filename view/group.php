<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/group.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/submit.function.js"></script>
    <script type="text/javascript">var id = <?php echo $Group['id']?>;</script>
  </head>
  <body>
  <?php include("/view/common/header.php");?>
    <section class="main">
      <ul class="detail_container">
        <li class="text_detail">
          <ul>
            <li><img src="../static/image/group1.jpg" alt="" class="avatar_circle"/>
            <h3 style="margin-top:5px"><?php echo $Group['name']; ?></h3></li>
            <li><?php echo $Group['description']; ?></li>
            <br>
            <li class="participants_container">
              <div class="sponsor_img_container">
                <img class="sponsor_img" src="../static/image/avatar.jpg" alt="<?php echo $Creator['login'];?>" />
              </div>
              <div class="participant_img_container">
                <?php foreach ($Members as $Member) {?>
                <img class="participant_img" src="../static/image/avatar.jpg" alt=<?php echo $Member['login'];?> />
                <?php }?>
                <p>由<?php echo $Creator['login'];?>建立，共<?php echo count($Members)+1;?>个成员，<a href="#">查看全部</a></p>
              </div>
            </li>
            <hr style="margin-right:0;">
            <li><div class="btn_container">
                <?php if(!$IsMember) {?>
                <a class='btn active' onclick="buttonSubmit(this, '/group/join', '已加入');">加入小组</a>
                <?php } else { ?>
                <a class='btn inactive' onclick="buttonSubmit(this, '', '加入小组');">已加入</a>
                <?php } ?>
            </div></li>
          </ul>
        </li>
      </ul>
      <div class="posts_container">
        <!-- <h4>活动介绍</h4> -->
        <table>
          <tbody>
            <tr>
              <th class="title">话题</th>
              <th class="author">作者</th>
              <th clsss="reply">回应</th>
              <th class="last">最后回应</th>
            </tr>
            <tr>
              <td class="title"><a href="/topic">ddl推迟了</a></td>
              <td class="author"><a href="/user">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-20 10:48:04</td>
            </tr>
            <tr>
              <td class="title"><a href="topic.html">早起打卡</a></td>
              <td class="author"><a href="user.php">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-25 06:15:04</td>
            </tr>
            <tr>
              <td class="title"><a href="topic.html">ddl推迟了</a></td>
              <td class="author"><a href="user.php">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-20 10:48:04</td>
            </tr>
            <tr>
              <td class="title"><a href="topic.html">早起打卡</a></td>
              <td class="author"><a href="user.php">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-25 06:15:04</td>
            </tr>
            <tr>
              <td class="title"><a href="/topic">ddl推迟了</a></td>
              <td class="author"><a href="/user">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-20 10:48:04</td>
            </tr>
            <tr>
              <td class="title"><a href="topic.html">早起打卡</a></td>
              <td class="author"><a href="user.php">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-25 06:15:04</td>
            </tr>
            <tr>
              <td class="title"><a href="topic.html">ddl推迟了</a></td>
              <td class="author"><a href="user.php">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-20 10:48:04</td>
            </tr>
            <tr>
              <td class="title"><a href="topic.html">早起打卡</a></td>
              <td class="author"><a href="user.php">Dora</a></td>
              <td clsss="reply">1</td>
              <td class="last">2016-10-25 06:15:04</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>
  <?php include("/view/common/footer.html");?>
  </body>
</html>
