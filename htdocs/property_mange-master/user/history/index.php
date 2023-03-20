<?php include('../../include/bottom2.php');include('edit_apply/index.php');include('../../lib/mysqli.php');$data=(new MySQLiDB())->get_apply_device();$data2=(new MySQLiDB())->get_alldevice();$data3=(new MySQLiDB())->get_use_device(); ?>
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
        <span class="area_">申請紀錄</span>
    </div>
</div>
<?php if(!empty($_SESSION['user_id'])){$data4=(new MySQLiDB())->get_history($_SESSION['user_id']); ?>
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
                        <th scope="col">數量</th>
                        <th scope="col">借用日期</th>
                        <th scope="col">預計歸還時間</th>
                        <th scope="col">申請時間</th>
                        <th scope="col">狀態</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </div>
                </thead>
                <tbody>
                <?php for($i=0;$i<sizeof($data);$i++){for($j=0;$j<sizeof($data2);$j++){if($data2[$j]['id']==$data[$i]['device_id'] && $data[$i]['user_id']==$_SESSION['user_id']){ ?>
                    <tr>
                        <td><?php echo $data2[$j]['type']; ?></td>
                        <td><?php echo $data2[$j]['name']; ?></td>
                        <td><?php echo $data[$i]['count']; ?></td>
                        <td><?php echo $data[$i]['fd']; ?></td>
                        <td><?php echo $data[$i]['sd']; ?></td>
                        <td><?php echo $data[$i]['n']; ?></td>
                        <td >申請中</td>
                        <td></td>
                        <td><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#editapply" onclick="document.getElementsByName('id')[0].value='<?php echo $data[$i]['id'] ?>';document.getElementsByName('id1')[0].value='<?php echo $data[$i]['device_id'] ?>';document.getElementsByName('type1')[0].value='<?php echo $data2[$i]['type'] ?>';document.getElementsByName('name1')[0].value='<?php echo $data2[$i]['name'] ?>';document.getElementsByName('count1')[0].value='<?php echo $data[$i]['count'] ?>';document.getElementsByName('apply_date')[0].value='<?php echo $data[$i]['fd'] ?>';document.getElementsByName('return_date')[0].value='<?php echo $data[$i]['sd'] ?>';" >修改</button></td>
                    </tr>
                <?php }}} ?>
                <?php for($i=0;$i<sizeof($data3);$i++){for($j=0;$j<sizeof($data2);$j++){if($data2[$j]['id']==$data3[$i]['device_id'] && $data3[$i]['user_id']==$_SESSION['user_id']){ ?>
                    <tr>
                        <?php
                        $today = getdate();
                        date("Y/m/d H:i");
                        $y=$today["year"];
                        $m=$today["mon"];
                        $d=$today["mday"];

                        $dd=mb_split('/',$data3[$i]['sd']);

                        if(intval($y)>intval($dd[2]))
                            $is_over=1;
                        else if(intval($y)==intval($dd[2]))
                        {
                            if(intval($m)>intval($dd[0]))
                                $is_over=1;
                            else if(intval($m)==intval($dd[0]))
                            {
                                if(intval($d)>intval($dd[1]))
                                    $is_over=1;
                                else
                                    $is_over=0;
                            }
                            else
                                $is_over=0;
                        }
                        else
                            $is_over=0;
                        ?>
                        <td><?php echo $data2[$j]['type']; ?></td>
                        <td><?php echo $data2[$j]['name']; ?></td>
                        <td><?php echo $data3[$i]['count']; ?></td>
                        <td><?php echo $data3[$i]['fd']; ?></td>
                        <td><?php echo $data3[$i]['sd']; ?></td>
                        <td><?php echo $data3[$i]['n']; ?></td>
                        <td <?php if($is_over==0){echo "style='color:green'";}else{echo "style='color:red'";} ?>><?php if($is_over==0){echo "已通過";}else{echo "未歸還";} ?></td>
                        <td><?php if($is_over==1){?><button type="button" class="btn btn-dark" onclick="">續借</button><?php } ?></td>
                        <td></td>
                    </tr>
                <?php }}} ?>
                <?php for($i=0;$i<sizeof($data4);$i++){for($j=0;$j<sizeof($data2);$j++){if($data2[$j]['id']==$data4[$i]['device_id'] && $data4[$i]['user_id']==$_SESSION['user_id']){ ?>
                    <tr>
                        <td><?php echo $data2[$j]['type']; ?></td>
                        <td><?php echo $data2[$j]['name']; ?></td>
                        <td><?php echo $data4[$i]['count']; ?></td>
                        <td><?php echo $data4[$i]['fd']; ?></td>
                        <td><?php echo $data4[$i]['sd']; ?></td>
                        <td><?php echo $data4[$i]['n']; ?></td>
                        <td style="color:blue;">已歸還</td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php }}} ?>
                </tbody>
            </table>
        </div>
    </div>
</form>
<?php }else { ?>
<h3 style="color:red;text-align: center">--尚未登入--</h3>
<?php } ?>
</body>
