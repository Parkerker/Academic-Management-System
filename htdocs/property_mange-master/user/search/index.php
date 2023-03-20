<?php include('../../include/bottom2.php');include('../../lib/mysqli.php');include('view_anydevice/index.php');include('apply/index.php');$data2=(new MySQLiDB())->get_devicetype(); ?>
<head>
    <script src="gijgo.min.js" type="text/javascript"></script>
    <link href="gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
    .txx{
        font-size: 30px;
        font-family: 標楷體;
    }
    .tx2{
        font-size: 20px;
        font-family: 標楷體;
    }
</style>
<body>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <span class="area_">搜尋設備</span>
        </div>
    </div>
        <div class="row">
            <div class="col-md-2 txx">
                設備類型
            </div>
            <div class="col-md-4">
                <select class="form-control tx2" name="device_type">
                    <option value="">未選擇</option>
                    <?php for($i=0;$i<sizeof($data2);$i++){ ?>
                        <option value="<?php echo $data2[$i]['name']; ?>"><?php echo $data2[$i]['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-md-6"></div>
        </div>
        <div class="row pt-md-3">
            <div class="col-md-2 txx">
                <label>搜尋設備名稱</label>
            </div>
            <div class="col-md-8">
                <div class="form-group txx">
                    <input type="text" name="device_name">
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4 pt-md-5 txx" >
                <button type="button" class="btn btn-dark txx" onclick="if(document.getElementsByName('device_name')[0].value=='' && document.getElementsByName('device_type')[0].value=='' )location.href='index.php'; else location.href='index.php?type='+document.getElementsByName('device_type')[0].value+'&name='+document.getElementsByName('device_name')[0].value">搜尋</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 pt-md-3 txx" style="text-align: center">
                <table class="table table-striped">
                    <thead>
                    <div class="txx">
                        <tr>
                            <th scope="col">設備ID</th>
                            <th scope="col">設備類型</th>
                            <th scope="col">設備名稱</th>
                            <th scope="col">管理者</th>
                            <th scope="col">剩餘數量</th>
                            <th scope="col">  </th>
                            <th scope="col">  </th>
                        </tr>
                    </div>
                    </thead>
                    <tbody>
                    <?php
                    if(empty($_GET['type']) && empty($_GET['name']))
                        $data=(new MySQLiDB())->get_alldevice();
                    else if(!empty($_GET['type']) && !empty($_GET['name']))
                        $data=(new MySQLiDB())->get_anydevice($_GET['type'],$_GET['name']);
                    else if(!empty($_GET['type']))
                        $data=(new MySQLiDB())->get_anydevice($_GET['type'],'');
                    else if(!empty($_GET['name']))
                        $data=(new MySQLiDB())->get_anydevice('',$_GET['name']);
                    ?>
                        <?php for($i=0;$i<sizeof($data);$i++){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $data[$i]['id']; ?></th>
                            <td><?php echo $data[$i]['type']; ?></td>
                            <td><?php echo $data[$i]['name']; ?></td>
                            <td><?php echo $data[$i]['acc']; ?></td>
                            <td><?php echo $data[$i]['count']; ?></td>
                            <td><button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#viewanydevice" onclick="document.getElementsByName('id')[0].value='<?php echo $data[$i]['id'] ?>';document.getElementsByName('acc')[0].value='<?php echo $data[$i]['acc'] ?>';document.getElementsByName('name')[0].value='<?php echo $data[$i]['name'] ?>';document.getElementsByName('type')[0].value='<?php echo $data[$i]['type'] ?>';document.getElementsByName('count')[0].value='<?php echo $data[$i]['count'] ?>';document.getElementsByName('year')[0].value='<?php echo $data[$i]['year'] ?>';document.getElementsByName('buy_date')[0].value='<?php echo $data[$i]['buy_date'] ?>';document.getElementsByName('place')[0].value='<?php echo $data[$i]['place'] ?>';document.getElementsByName('price')[0].value='<?php echo $data[$i]['price'] ?>';document.getElementById('photo1').src='../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['photo'] ?>';document.getElementById('photo2').src='../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['photo2'] ?>';document.getElementById('photo3').src='../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['photo3'] ?>';document.getElementById('guarantee').src='../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['guarantee'] ?>';document.getElementById('operating').href='../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['operating'] ?>';document.getElementById('teach').href='../../upload/<?php echo $data[$i]['acc'].'/'.$data[$i]['teach'] ?>';">詳細資料</button></td>
                            <td><button type="button" class="btn btn-dark" <?php if(empty($_SESSION['user_id']) || $data[$i]['count']==0)echo "disabled"; ?> data-toggle="modal" data-target="#applydevice" onclick="document.getElementsByName('id1')[0].value='<?php echo $data[$i]['id'] ?>';document.getElementsByName('type1')[0].value='<?php echo $data[$i]['type'] ?>';document.getElementsByName('name1')[0].value='<?php echo $data[$i]['name'] ?>';document.getElementsByName('count1')[0].value='<?php echo $data[$i]['count'] ?>';" >申請設備</button></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
