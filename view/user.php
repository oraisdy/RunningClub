<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/user.css" media="screen" title="no title">
    <script type="text/javascript" src="../static/js/jquery.js"></script>
    <script type="text/javascript" src="../static/js/submit.function.js"></script>
    <script type="text/javascript" src="../static/js/library/echarts.min.js"></script>
    <script type="text/javascript">var id = <?php echo $User['id']?>;</script>
  </head>
  <body>
    <?php include("common/header.php"); ?>
    <div class="banner">
    </div>
    <div class="main">
      <div class="left">
        <img class="avatar" src="../static/image/avatar.jpg" alt="" style="width:200px; height:200px"/>
        <h4 class="nickname"><?php echo $User['login'];?></h4>
        <p>
          已运动 <?php echo $Record['days'];?> 天
        </p>
        <p>
          累计里程 <?php echo $Record['distances'];?> km
        </p>
        <p>
          共燃烧 <?php echo $Record['calories'];?> 大卡
        </p>
        <?php if(!$IsMe && !$IsFollowing) {?>
        <button class="btn" onclick="buttonSubmit(this,'/user/follow','已关注');">关 注</button>
        <?php } elseif($IsFollowing && !$IsFriend) {?>
            <button class="btn inactive" onclick="buttonSubmit(this,'','');">已关注</button>
        <?php } elseif($IsFriend) { ?>
              <button class="btn inactive" onclick="buttonSubmit(this,'','');">  相互关注</button>
        <?php } ?>

        <!-- group big start -->
        <div class="group-big">
          <h4><?php echo $User['login']?>的小组<small>(2)</small></h4>
          <!-- small group start -->
          <div class="group-small">
            <div class="img_container">
              <a href="#"><img src="../static/image/group1.jpg" alt="" /></a>
            </div>
            <a href="#">骑行爱好者</a>
             <p class="icon_line">
               <i class="fa fa-child fa-blue" aria-hidden="true">4</i>
               <i class="fa fa-comments-o" aria-hidden="true">124</i>
             </p>
          </div><!-- small group end -->

          <!-- small group start -->
          <div class="group-small">
            <div class="img_container">
              <a href="#"><img src="../static/image/group2.jpg" alt="" /></a>
            </div>
            <a href="#">攀岩</a>
             <p class="icon_line">
               <i class="fa fa-child fa-blue" aria-hidden="true">4</i>
               <i class="fa fa-comments-o" aria-hidden="true">124</i>
             </p>
          </div><!-- small group end -->
        </div><!-- big group start -->
      </div>
      <div class="right">

        <!-- group big start -->
        <div class="group-big">
          <h4><?php echo $User['login']?>的运动记录</h4>
          <div id="chart" style="width: 600px;height:400px;"></div>
        </div><!-- big group end -->

        <!-- group big start -->
        <div class="group-big">
          <h4><?php echo $User['login']?>参与的活动<small>(<?php echo count($Activities)?>)</small></h4>
          <?php
          foreach($Activities as $Activity){
          ?>
          <!-- middle group start -->
          <div class="group-middle">
            <div class="img_container">
              <a href="/a/<?php echo $Activity['id'];?>"><img src="../static/image/activity1.jpg" alt="" /></a>
            </div>
            <div class="text_container">
              <a href="/a/<?php echo $Activity['id'];?>"><h4><?php echo $Activity['title']?></h4></a>
              <div class="col_container">
                <li><i class="fa fa-hashtag fa-border" aria-hidden="true"></i></li>
                <li><?php echo $Activity['type']?></li>
              </div>
              <div class="col_container">
                <li><i class="fa fa-location-arrow fa-border" aria-hidden="true"></i></li>
                <li><?php echo $Activity['location']?></li>
              </div>
              <div class="col_container">
                <li><i class="fa fa-calendar fa-border" aria-hidden="true"></i></li>
                <li><?php echo explode(" ", $Activity['startAt'])[0];?></li>
              </div>
            </div>
          </div>
          <!-- middle group end -->
          <?php } ?>
        </div><!-- big group end -->
      </div>
    </div>
    </div>
    <?php include("common/footer.html"); ?>

    <script>
      var myChart = echarts.init(document.getElementById('chart'));

      option = {
        tooltip: {
          trigger: 'axis'
        },
        color:['#fa5400'],
        toolbox: {
          show: true,
          feature: {
            dataZoom: {
              yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']},
            restore: {},
            saveAsImage: {}
          }
        },
        xAxis:  {
          type: 'category',
          boundaryGap: false,
          data: <?php echo json_encode($RecentDates);?>
        },
        yAxis: {
          type: 'value',
          axisLabel: {
            formatter: '{value} km'
          }
        },
        series: [
          {
            type:'line',
            data:<?php echo json_encode($RecentDistances);?>,
            markPoint: {
              data: [
                {name: '周最低', value: -2, xAxis: 1, yAxis: -1.5}
              ]
            },
            markLine: {
              data: [
                {type: 'average', name: '平均值'},
                [{
                  symbol: 'none',
                  x: '90%',
                  yAxis: 'max'
                }, {
                  symbol: 'circle',
                  label: {
                    normal: {
                      position: 'start',
                      formatter: '最大值'
                    }
                  },
                  type: 'max',
                  name: '最高点'
                }]
              ]
            }
          }
        ]
      };
      myChart.setOption(option);
    </script>
  </body>

</html>
