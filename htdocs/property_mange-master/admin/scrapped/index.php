<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');$data=(new MySQLiDB())->get_delete_device($_SESSION['admin_account']); ?>
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
    <div class="col-md-12 txx" style="text-align: center">
        <span class="area_">報廢紀錄</span>
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
                            <th scope="col">設備類型</th>
                            <th scope="col">設備名稱</th>
                            <th scope="col">報廢日期</th>
                            <th scope="col">簽收單</th>
                        </tr>
                    </div>
                </thead>
                <tbody>
                <?php for($i=0;$i<sizeof($data);$i++){ ?>
                    <tr>
                        <td><?php echo $data[$i]['type']; ?></td>
                        <td><?php echo $data[$i]['name']; ?></td>
                        <td><?php echo $data[$i]['n']; ?></td>
                        <td></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
