<?php include('../../../include/bottom3.php');include('../../../lib/mysqli.php');include('view_anydevice/index.php');$data=(new MySQLiDB())->get_alldevice(); ?>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
    .txx{
        font-size: 20px;
        font-family: 標楷體;
    }
</style>
<body>
<div class="row">
    <div class="col-md-12" style="text-align: center">
        <span class="area_">查看所有設備</span>
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
                            <th scope="col">設備ID</th>
                            <th scope="col">設備類型</th>
                            <th scope="col">設備名稱</th>
                            <th scope="col">管理者</th>
                            <th scope="col">剩餘數量</th>
                            <th scope="col"></th>
                        </tr>
                    </div>
                </thead>
                <tbody>
                    <?php for($i=0;$i<sizeof($data);$i++){ ?>
                        <tr>
                            <th scope="row"><?php echo $data[$i]['id']; ?></th>
                            <td><?php echo $data[$i]['type']; ?></td>
                            <td><?php echo $data[$i]['name']; ?></td>
                            <td><?php echo $data[$i]['acc']; ?></td>
                            <td><?php echo $data[$i]['count']; ?></td>
                            <td><button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#viewanydevice" onclick="document.getElementsByName('id')[0].value='<?php echo $data[$i]['id'] ?>';document.getElementsByName('acc')[0].value='<?php echo $data[$i]['acc'] ?>';document.getElementsByName('name')[0].value='<?php echo $data[$i]['name'] ?>';document.getElementsByName('type')[0].value='<?php echo $data[$i]['type'] ?>';document.getElementsByName('count')[0].value='<?php echo $data[$i]['count'] ?>';document.getElementsByName('year')[0].value='<?php echo $data[$i]['year'] ?>';document.getElementsByName('buy_date')[0].value='<?php echo $data[$i]['buy_date'] ?>';document.getElementsByName('place')[0].value='<?php echo $data[$i]['place'] ?>';document.getElementsByName('price')[0].value='<?php echo $data[$i]['price'] ?>';document.getElementById('photo1').src='../../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['photo'] ?>';document.getElementById('photo2').src='../../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['photo2'] ?>';document.getElementById('photo3').src='../../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['photo3'] ?>';document.getElementById('guarantee').src='../../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['guarantee'] ?>';document.getElementById('operating').href='../../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['operating'] ?>';document.getElementById('teach').href='../../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['teach'] ?>';">詳細資料</button></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
</body>
