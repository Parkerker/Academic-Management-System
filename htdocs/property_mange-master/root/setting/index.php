<?php include('../../include/bottom2.php');include('../../lib/mysqli.php'); ?>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
    .txx{
        font-size: 30px;
        font-family: 標楷體;
    }
</style>
<div class="row">
    <div class="col-md-12" style="text-align: center">
        <span class="area_">設定</span>
    </div>
</div>
<p></p>
<?php $data=(new MySQLiDB())->get_root_setting(); ?>
<form action="save.php" method="post">
    <div class="row">
        <div class="col-md-1" ></div>
        <div class="col-md-2 txx" >
            跑馬燈訊息：
        </div>
        <div class="form-group col-md-6">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="marquee_text" rows="2"><?php echo $data[0]['marquee_text']; ?></textarea>
        </div>
        <p></p>
        <p></p>
    </div>
    <div class="row">
        <div class="col-md-1 " >
        </div>
        <div class="col-md-2 txx" >
            注意事項內容：
        </div>
        <div class="form-group col-md-6">
            <textarea class="form-control text-justify" id="exampleFormControlTextarea1" name="precautions" rows="10"><?php echo $data[0]['precautions']; ?></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 pt-md-3" style="text-align: center">
            <button type="submit" class="btn btn-primary btn-lg">儲存</button>
        </div>
    </div>
</form>


