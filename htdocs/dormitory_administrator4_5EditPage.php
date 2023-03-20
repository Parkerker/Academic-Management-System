<!DOCTYPE html>
<html>
<body>
<?php
    require "ConnectDB.php";

    $id=($_GET['id']);
    $sql = "SELECT * FROM Fix_Equipment WHERE Time = '$id'";
    $result = $conn ->query($sql);
    $row = $result -> fetch_assoc();

    $S_ID = $row['S_ID'];
    $Equip_ID = $row['Equip_ID'];
    $Time = $row['Time'];
    $Situation = $row['Situation'];

    
?>
<form action="dormitory_administrator4_5Edit.php" method="post">
    <label></label>    
    </br>
    <label>報修學生：</label>
    </br>
    <input type="text" id="S_ID" name="S_ID" value="<?php echo $S_ID;?>"readonly>
    </br>
    <label>設備ID：</label>
    </br>
    <input type="text" id="Equip_ID" name="Equip_ID" value="<?php echo $Equip_ID;?>"readonly>
    </br>
    <label>申請時間：</label>
    </br>
    <input type="text" id="Time" name="Time" value="<?php echo $Time;?>"readonly>
    </br>
    <label>報修情形：</label>
    </br>
    <input type="text" id="Situation" name="Situation" value="<?php echo $Situation;?>">
    </br>
    
    
    </br>
    <input type="submit" value="修改資料" />

</form>
</body>
</html>
<!-- 
<th>報修學生</th>
<th>設備ID</th>
<th>申請時間</th>
<th>報修情形</th>
<th>設備問題描述</th>

            <td>".$row["S_ID"]."</td>
			<td>".$row["Equip_ID"]."</td>
			<td>".$row["Time"]."</td>   
            <td>".$row["Situation"]."</td>
            <td>".$row["Content"]."</td> -->