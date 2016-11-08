<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="../static/css/style.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/font-awesome.css">
    <link rel="stylesheet" href="../static/css/master.css" media="screen" title="no title">
    <link rel="stylesheet" href="../static/css/activities.css" media="screen" title="no title">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="../static/js/library/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script src="../static/js/submit.function.js"></script>
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
          <li><a href="/activities/my">我参与的活动</a></li>
          <li><a href="/activities/ongoing">进行中的活动</a></li>
          <li><a href="/activities/due">结束的活动</a></li>
          <li><a href="/activities/new">创建活动</a></li>
        </ul>
      </div>
      <div class="right">
        <div class="group-big">
          <h4>我参与的活动<small>(2)</small></h4>
          <div class="form_container">
            <form class="" action="/activity/new" method="post">
              <div><label>活动名称：</label><input class="field" type="text" name="title" value="" placeholder=""></div>
              <div><label>活动类型：</label>线上<input type="radio" checked="checked" name="type" value="线上" />
                线下<input type="radio" name="type" value="线下" ></div>
              <div><label>活动地点：</label><input class="field" type="text" name="location" value="" placeholder=""></div>
<!--              <div>开始于<input class="date_picker field" style="width: 150px;margin:0 30px" type="text" name="startAt" value="" />-->
<!--                  结束于<input class="date_picker field" style="width: 150px;margin:0 30px" name="endAt" value="" ></div>-->
              <div><label>活动时间：</label><input class="field" type="text" name="daterange"/></div>

              <div><label>活动描述：</label><textarea type="text" name="description" value="" placeholder=""></textarea></div>
              <div style="margin-left: 150px;"><input class="checkbox" checked type="checkbox" name="ifJoin">同时加入活动</div>
              <input type="submit" class="btn" value="<?php echo $State?>">
<!--              <input type="submit" class="btn" value="创  建" onclick="buttonSubmit(this,'/activity/new','创建成功');">-->
            </form>
          </div>
      </div>
    </div>
    <?php include("/view/common/footer.html");?>


    <script>
      $(function () {
        $('input[name="daterange"]').daterangepicker({
          timePicker: true,
          timePickerIncrement: 30,
          locale: {
            format: 'YYYY-MM-DD H:mm',
            separator: ' 到 ',
          },
          startDate: '<?php echo date('YYYY-MM-DD H:mm',$TimeStamp);?>',
          endDate: '<?php echo date('YYYY-MM-DD H:mm',$TimeStamp);?>',
        });
      });


    </script>
  </body>
</html>
