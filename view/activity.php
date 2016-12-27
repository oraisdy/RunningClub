<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>活动 - <?php echo $Activity['title'];?></title>
    <meta name="description" content="<?php echo $Activity['description'];?>">
    <link rel="stylesheet" href="/static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="/static/css/font-awesome.css">
    <link rel="stylesheet" href="/static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="/static/css/activity.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/submit.function.js"></script>
    <script type="text/javascript">var id = <?php echo $Activity['id']?>;</script>
  </head>
  <body>
    <?php include("./view/common/header.php");?>
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
                <img class="sponsor_img" src=<?php echo $Sponsor['avatar_url'];?> alt="发起者" title="<?php echo $Sponsor['login'] ?>"/>
              </div>
              <div class="participant_img_container">
                <?php foreach ($Participates as $user){  ?>
                  <img class="participant_img" src=<?php echo $user['avatar_url'];?> alt="参与者" title="<?php echo $user['login'] ?>" />
                <?php } ?>

                <p>由<?php echo $Sponsor['login']?>发起，<?php echo $Activity['participateCount'];?>人参与了活动，<a href="#rank">查看全部</a></p>
              </div>
            </li>
            <hr style="margin-right:0;">
            <li><div class="btn_container">
              <?php if (!$IsParticipate) { ?>
                <a class='btn active' href="#" onclick="buttonSubmit(this,id, '/activity/join', '报名成功');">我要报名</a>
              <?php } else { ?>
                <a class='btn inactive' href="#" onclick="buttonSubmit(this,id, '', '我要报名');">报名成功</a>
              <?php } ?>
            </div>
              <div class="btn_container">
                <a id='btnInvite' class='btn' href="#" onclick="showFriends();">邀请好友</a>
              </div>
            </li>
            <li id="inviteFriends"></li>
          </ul>
        </li>
      </ul>
      <div class="description_container">
        <h4>活动介绍</h4>
        <pre><?php echo $Activity['description']?></pre>
      </div>
      <div class="result_container" id="rank">

      <h4>参与者排名</h4>
      <div id="chart" style="width: 1080px;height:400px; overflow: auto;"></div>
    </section>
    <?php include("./view/common/footer.html");?>


    <script>

      function inviteSomebody(btn, inviteId) {
        // console.log(url);
        $.ajax({
          url: "/activity/invite",
          data: {
            eventId: id,
            friendId:inviteId
          },
          type: "POST",
          success: function (data) {
//            $('#btnInvite').innerHTML = '邀请成功';
//            $('#btnInvite').setStyle('backgroundColor','#676767');
//            $('#btnInvite').setStyle('borderColor', '#676767');
            console.log(data);
            alert('邀请成功');
          },
          error : function (msg,meg) {
            console.log(msg);
            console.log(meg);
          }
        });

      }

      function showFriends() {
        $('#inviteFriends').load("/activity/invite");
        $('#inviteFriends').show();
      }
    </script>
    <script src="/static/js/library/build/dist/echarts.js"></script>
    <script type="text/javascript">
      // 路径配置
      require.config({
        paths: {
          echarts: '/static/js/library/build/dist/'
        }
      });

      // 使用
      require(
          [
            'echarts',
            'echarts/chart/bar' // 使用柱状图就加载bar模块，按需加载
          ],
          function (ec) {
            // 基于准备好的dom，初始化echarts图表
            var myChart = ec.init(document.getElementById('chart'));

            option = {
              xAxis : [
                {
                  type : 'value',
                  boundaryGap : [0, 0.01],
                  show:false
                }
              ],
              yAxis : [
                {
                  type : 'category',
                  data : <?php echo json_encode($Users)?>,
                  axisTick:[{show:false}]
                }
              ],
              animation:false,
              tooltip: {
                trigger: 'axis',
                axisPointer: {
                  type: 'shadow'
                }
              },
              series : [
                {
                  type:'bar',
                  itemStyle: {normal: {
                    label : {show: true,position:'right'}
                  }},
//                  barWidth:85,
//                  barGap:'20%',
                  data:<?php echo json_encode($Scores)?>
                }
              ]
            };

            // 为echarts对象加载数据
            myChart.setOption(option);
          }
      );
    </script>

  </body>
</html>
