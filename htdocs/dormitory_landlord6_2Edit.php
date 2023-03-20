<?php
require "ConnectDB.php";

    $new_Address = $_POST['Address'];
    $new_Landlord_ID = $_POST['Landlord_ID'];
    $new_Title = $_POST['Title'];
    $new_Content = $_POST['Content'];

    $sql = "UPDATE houses SET
            Landlord_ID= '$new_Landlord_ID',
            Title = '$new_Title',
            Content = '$new_Content'
            WHERE (Address = '$new_Address')";

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