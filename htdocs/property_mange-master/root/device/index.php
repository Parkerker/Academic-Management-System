<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');include('../edit_admin/index.php');include('../add_device/index.php'); ?>
<style>
    .area_ {
        font-size: 40px;
        font-family: 標楷體;
    }
    .btn-xl {
        padding: 15px 40px;
    <!--
    font-size: 100px;
    border-radius: 10px;
    -->
    }
    .s{
        font-size: 20px;
        font-family: 標楷體;
    }
</style>
<div class="row">
    <div class="col-md-12 pt-md-3" style="text-align: center">
        <span class="area_">設備類型管理</span>
        <button style="float:right" type="button" class="btn btn-lg btn-light btn-outline-dark" data-toggle="modal" data-target="#adddevicetype" >新增</button>
    </div>
</div>
<p>
    <?php $data=(new MySQLiDB())->get_devicetype();?>
<div class="row" style="text-align: center">
    <table class="table table-striped" style="text-align: center;">
        <thead>
        <tr>
            <th scope="col">設備類型</th>
            <th scope="col">  </th>
        </tr>
        </thead>
        <tbody>
        <?php for($i=0;$i<sizeof($data);$i++){ ?>
            <tr>
                <th scope="row" style="width: 15%"><?php echo $data[$i]['name'] ?></th>
                <form action="delete.php" method="POST">
                    <input type="hidden" name="device_name" value="<?php echo $data[$i]['name'] ?>">
                    <td style="width: 10%"><button type="submit" class="btn btn-danger">刪除</button></td>
                </form>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
