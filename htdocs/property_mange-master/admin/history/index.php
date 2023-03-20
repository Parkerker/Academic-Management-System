<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');$data=(new MySQLiDB())->get_allhistory();$data2=(new MySQLiDB())->get_device($_SESSION['admin_account']); ?>
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
<body>
<div class="row">
    <div class="col-md-12" style="text-align: center">
        <span class="area_">歷史紀錄</span>
    </div>
</div>
<p>
<form action="">
<!--    <div class="row pt-md-4">-->
<!--        <div class="col-md-2 pt-md-2 txx" style="text-align: center">-->
<!--            使用者-->
<!--        </div>-->
<!--        <div class="col-md-2">-->
<!--            <div class="form-group txx">-->
<!--                <select class="form-control txx" id="user_id">-->
<!--                    <option>電腦設備</option>-->
<!--                    <option>器材類</option>-->
<!--                </select>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="col-md-2">-->
<!--        </div>-->
<!--        <div class="col-md-2 txx">-->
<!--            <button type="button" class="btn btn-dark btn-lg">搜尋</button>-->
<!--        </div>-->
<!--        <div class="col-md-2 txx">-->
<!--            <button type="button" class="btn btn-dark btn-lg">匯出EXCEL</button>-->
<!--        </div>-->
<!--    </div>-->
    <div class="row pt-md-4">
        <div class="col-md-12 txx" style="text-align: center">
            <table class="table table-striped">
                <thead>
                <div class="txx">
                    <tr>
                        <th scope="col">設備類型</th>
                        <th scope="col">設備名稱</th>
                        <th scope="col">數量</th>
                        <th scope="col">學號</th>
                        <th scope="col">借用日期</th>
                        <th scope="col">申請時間</th>
                    </tr>
                </div>
                </thead>
                <tbody>
                    <?php for($i=0;$i<sizeof($data);$i++){for($j=0;$j<sizeof($data2);$j++){if($data2[$j]['id']==$data[$i]['device_id']){ ?>
                    <tr>
                        <td><?php echo $data2[$j]['type']; ?></td>
                        <td><?php echo $data2[$j]['name']; ?></td>
                        <td><?php echo $data[$i]['count']; ?></td>
                        <td><?php echo $data[$i]['user_id']; ?></td>
                        <td><?php echo $data[$i]['fd']; ?></td>
                        <td><?php echo $data[$i]['n']; ?></td>
                    </tr>
                    <?php }}} ?>
                </tbody>
            </table>
        </div>
    </div>

</form>
</body>
