<!DOCTYPE html>
<html>
<body>
<?php
    require "ConnectDB.php";

    $id=($_GET['id']);
    $sql = "SELECT * FROM houses WHERE Address = '$id'";
    $result = $conn ->query($sql);
    $row = $result -> fetch_assoc();

    $Address = $row['Address'];
    $Landlord_ID = $row['Landlord_ID'];
    $Title = $row['Title'];
    $Content = $row['Content'];

?>
<form action="dormitory_landlord6_2Edit.php" method="post">
    <label></label>    
    </br>
    <label>地址：</label>
    </br>
    <input type="text" id="Address" name="Address" value="<?php echo $Address;?>"readonly>  
    </br>
    <label>房東編號：</label>
    </br>
    <input type="text" id="Landlord_ID" name="Landlord_ID" value="<?php echo $Landlord_ID;?>"readonly>
    </br>
    <label>類型：</label>
    </br>
    <input type="text" id="Title" name="Title" value="<?php echo $Title;?>">
    </br>
    <label>補充內容：</label>
    </br>
    <input type="text" id="Content" name="Content" value="<?php echo $Content;?>">
    </br>
    </br>
    <input type="submit" value="修改資料" />

</form>
</body>
</html>

<!--
            <td>".$row["Address"]."</td>
			<td>".$row["Landlord_ID"]."</td>
			<td>".$row["Title"]."</td>
			<td>".$row["Content"]."</td>

<th>地址</th>
<th>房東編號</th>
<th>類型</th>
<th>補充內容</th>
-->