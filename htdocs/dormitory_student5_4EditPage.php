<!DOCTYPE html>
<html>
<body>
<?php
    require "ConnectDB.php";

    $id=($_GET['id']);
    $sql = "SELECT * FROM student WHERE ID = '$id'";
    $result = $conn ->query($sql);
    $row = $result -> fetch_assoc();

    $ID = $row['ID'];
    $Name = $row['Name'];
    $Phone = $row['Phone'];
    // $Room_number = $row['Room_number'];
    $Password = $row['Password'];

?>
<form action="dormitory_student5_4Edit.php" method="post">
    <label></label>    
    </br>
    <label>學號：</label>
    </br>
    <input type="text" id="ID" name="ID" value="<?php echo $ID;?>"readonly>  
    </br>
    <label>姓名：</label>
    </br>
    <input type="text" id="Name" name="Name" value="<?php echo $Name;?>">
    </br>
    <label>電話：</label>
    </br>
    <input type="text" id="Phone" name="Phone" value="<?php echo $Phone;?>">
    </br>
    <label>密碼：</label>
    </br>
    <input type="text" id="Password" name="Password" value="<?php echo $Password;?>">
    </br>
    </br>
    <input type="submit" value="修改資料" />

</form>
</body>
</html>

<!--
<td>".$row["ID"]."</td>
			<td>".$row["Name"]."</td>
			<td>".$row["Phone"]."</td>
            <td>".$row["Room_number"]."</td>
            <td>".$row["Password"]."</td>
<th>學號</th>
<th>姓名</th>
<th>電話</th>
<th>房間號碼</th>
<th>密碼</th>

-->