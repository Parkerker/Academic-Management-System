<?php
    require "ConnectDB.php";
    $Address = $_POST['Address'];
    $Landlord_ID = $_POST['Landlord_ID'];
    $Title = $_POST['Title'];
    $Content = $_POST['Content'];


    $sql = "INSERT INTO Houses VALUES ('$Address','$Landlord_ID','$Title','$Content')";

    mysqli_query($conn,$sql);

    header("Location: dormitory_landlord6_2.php");

?>

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
