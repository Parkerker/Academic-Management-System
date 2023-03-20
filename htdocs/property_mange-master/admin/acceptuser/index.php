<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');?>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
</style>
<div class="row">
    <div class="col-md-12" style="text-align: center">
        <span class="area_">審核帳號申請</span>
    </div>
</div>
<?php $data=(new MySQLiDB())->get_apply_user();if(sizeof($data)==0){?>
<div class="row">
    <div class="col-md-12" style="text-align: center;color: red;font-size: 20px">
        <span>-----暫無帳號申請-----</span>
    </div>
</div>
<?php }else{ ?>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">學號</th>
        <th scope="col">姓名</th>
        <th scope="col">密碼</th>
        <th scope="col">信箱</th>
        <th scope="col">手機</th>
        <th scope="col"></th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php for($i=0;$i<sizeof($data);$i++){ ?>
            <tr>
                <th scope="row" style="width: 15%"><?php echo $data[$i]['user_id'] ?></th>
                <td style="width: 10%"><?php echo $data[$i]['user_name'] ?></td>
                <td style="width: 15%"><?php echo $data[$i]['user_pass'] ?></td>
                <td style="width: 15%"><?php echo $data[$i]['user_mail'] ?></td>
                <td style="width: 15%"><?php echo $data[$i]['user_cell'] ?></td>
                <form action="accept.php" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $data[$i]['user_id'] ?>">
                <td style="width: 10%"><button type="submit" class="btn btn-success">批准</button></td>
                </form>
                <form action="refuse.php" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $data[$i]['user_id'] ?>">
                    <td style="width: 10%"><button type="submit" class="btn btn-danger">拒絕</button></td>
                </form>
            </tr>
    <?php } ?>
    </tbody>
</table>
<?php } ?>