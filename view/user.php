<!DOCTYPE html>
<html>
<head>

  <title>运动 - <?php echo $User['login'];?></title>
  <?php include("./view/common/css_and_js.php");?>
  <script type="text/javascript" src="../static/js/submit.function.js"></script>
  <script type="text/javascript" src="../static/js/library/echarts.min.js"></script>
  <script type="text/javascript">var id = <?php echo $User['id']?>;</script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <?php include("./view/common/header.php");?>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">

      <?php include("./view/common/content_header.php");?>
      <!-- Main content -->
      <section class="content row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
              <div class="box-body box-profile">

                <img class="profile-user-img img-responsive img-circle" src=<?php echo $User['avatar_url'];?> alt="User profile picture">

                <h3 class="profile-username text-center"><?php echo $User['login'];?></h3>

                <p class="text-muted text-center"><?php echo $User['description'];?></p>

                <p class="text-muted text-center">
                  已运动 <?php echo $Record['days'];?> 天
                </p>
                <p class="text-muted text-center">
                  累计里程 <?php echo $Record['distances'];?> km
                </p>
                <p class="text-muted text-center">
                  共燃烧 <?php echo $Record['calories'];?> 大卡
                </p>

<!--                <ul class="list-group list-group-unbordered">-->
<!--                  <li class="list-group-item">-->
<!--                    <b>Followers</b> <a class="pull-right">1,322</a>-->
<!--                  </li>-->
<!--                  <li class="list-group-item">-->
<!--                    <b>Following</b> <a class="pull-right">543</a>-->
<!--                  </li>-->
<!--                  <li class="list-group-item">-->
<!--                    <b>Friends</b> <a class="pull-right">13,287</a>-->
<!--                  </li>-->
<!--                </ul>-->


                <?php if(!$IsMe && !$IsFollowing) {?>
                  <a class="btn btn-primary btn-block" onclick="buttonSubmit(this,<?php echo $User['id']?>,'/user/follow','已关注');" title="关注"><b>关 注</b></a>
                <?php } elseif($IsFollowing && !$IsFriend) {?>
                  <a class="btn btn-primary btn-block inactive" onclick="buttonSubmit(this,<?php echo $User['id']?>,'','');" title="取消关注"><b>已关注</b></a>
                <?php } elseif($IsFriend) { ?>
                  <a class="btn btn-primary btn-block inactive" onclick="buttonSubmit(this,<?php echo $User['id']?>,'','');" title="取消关注"><b>相互关注</b></a>
                <?php } ?>

              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">About Me</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->



          <!-- Main content -->
          <section class="col-md-9">

            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $User['login']?>的运动记录</h3>
              </div>
              <div class="box-body">
                <div id="chart" style="width: 600px;height:400px;"></div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </section>
      </div>


      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>

  <?php include "./view/common/footer.php"?>
</div>
<!-- ./wrapper -->

<?php include "./view/common/js_to_import.php"?>

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


