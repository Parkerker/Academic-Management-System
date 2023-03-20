<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');include('../edit_user/index.php');include('../add_user/index.php'); ?>
<style>
    .area_  {
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
        <span class="area_">使用者管理</span>
        <button style="float:right" type="button" class="btn btn-lg btn-light btn-outline-dark" data-toggle="modal" data-target="#adduser">新增</button>
    </div>
</div>
<p>
    <?php $data=(new MySQLiDB())->get_user();?>
<table class="table table-striped" style="text-align: center">
    <thead>
    <tr>
        <th scope="col">學號</th>
        <th scope="col">密碼</th>
        <th scope="col">姓名</th>
        <th scope="col">信箱</th>
        <th scope="col">手機</th>
        <th scope="col">  </th>
        <th scope="col">  </th>
    </tr>
    </thead>
    <tbody>
    <?php for($i=0;$i<sizeof($data);$i++){ ?>
        <tr>
            <th scope="row" style="width: 15%"><?php echo $data[$i]['user_id'] ?></th>
            <td style="width: 10%"><?php echo $data[$i]['user_pass'] ?></td>
            <td style="width: 15%"><?php echo $data[$i]['user_name'] ?></td>
            <td style="width: 15%"><?php echo $data[$i]['user_mail'] ?></td>
            <td style="width: 15%"><?php echo $data[$i]['user_cell'] ?></td>
            <td style="width: 10%"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#edituser" onclick="document.getElementsByName('edit_acc')[0].value='<?php echo $data[$i]['user_id'] ?>';document.getElementsByName('edit_pass')[0].value='<?php echo $data[$i]['user_pass'] ?>';document.getElementsByName('edit_name')[0].value='<?php echo $data[$i]['user_name'] ?>';document.getElementsByName('edit_mail')[0].value='<?php echo $data[$i]['user_mail'] ?>';document.getElementsByName('edit_cell')[0].value='<?php echo $data[$i]['user_cell'] ?>'">編輯</button></td>
            <form action="../edit_user/delete.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $data[$i]['user_id'] ?>">
                <td style="width: 10%"><button type="submit" class="btn btn-danger">註銷</button></td>
            </form>
        </tr>
    <?php } ?>
    </tbody>
</table>