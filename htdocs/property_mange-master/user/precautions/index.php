<?php include('../../include/bottom2.php');include('../../lib/mysqli.php'); ?>
<style>
    .area_1{
        font-size: 40px;
        font-family: 標楷體;
    }
    .area_2{
        font-size: 30px;
        font-family: 標楷體;
    }
</style>
<?php $data=(new MySQLiDB())->get_root_setting(); ?>
<body >
    <div class="row">
      <div class="col-md-12" style="text-align: center">
          <span class="area_1">注意事項</span>
      </div>
        <div class="col-md-12 area_2"><?php echo nl2br($data[0]['precautions']); ?></div>
    </div>
</body>