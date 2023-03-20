<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');$data=(new MySQLiDB())->get_apply_device();$data2=(new MySQLiDB())->get_device($_SESSION['admin_account']); ?>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
    .txx{
        font-size: 25px;
        font-family: 標楷體;
    }
</style>
<body>
<div class="row">
    <div class="col-md-12" style="text-align: center">
        <span class="area_">借用單</span>
    </div>
</div>
<p>
<form action="">
    <div class="row">
        <div class="col-md-12 txx" style="text-align: center">
            <table class="table table-striped">
                <thead>
                <div class="txx">
                    <tr>
                        <th scope="col">申請單號</th>
                        <th scope="col">設備ID</th>
                        <th scope="col">設備類型</th>
                        <th scope="col">設備名稱</th>
                        <th scope="col">學號</th>
                        <th scope="col">數量</th>
                        <th scope="col">借用日期</th>
                        <th scope="col">預計歸還時間</th>
                        <th scope="col">申請時間</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </div>
                </thead>
                <tbody>
                <?php for($i=0;$i<sizeof($data);$i++){for($j=0;$j<sizeof($data2);$j++){if($data2[$j]['id']==$data[$i]['device_id']){ ?>
                    <tr>
                        <td><?php echo $data[$i]['id']; ?></td>
                        <td><?php echo $data[$i]['device_id']; ?></td>
                        <td><?php echo $data2[$j]['type']; ?></td>
                        <td><?php echo $data2[$j]['name']; ?></td>
                        <td><?php echo $data[$i]['user_id']; ?></td>
                        <td><?php echo $data[$i]['count']; ?></td>
                        <td><?php echo $data[$i]['fd']; ?></td>
                        <td><?php echo $data[$i]['sd']; ?></td>
                        <td><?php echo $data[$i]['n']; ?></td>
                        <td><button type="button" class="btn btn-success" <?php if($data[$i]['count']<=0)echo 'disabled'; ?> onclick="location.href='accept.php?id=<?php echo $data[$i]['id']; ?>'">批准</button></td>
                        <td><button type="button" class="btn btn-danger" onclick="location.href='refuse.php?id=<?php echo $data[$i]['id']; ?>'">拒絕</button></td>
                    </tr>
                <?php }}} ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
