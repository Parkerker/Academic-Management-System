<?php
    require "ConnectDB.php";
    $Ann_ID = $_POST['Ann_ID'];
    // $Rent = $_POST['Rent'];
    // $Daystart = $_POST['Daystart'];
    // $Dayline = $_POST['Dayline'];
    // $Landlord_ID = $_POST['Landlord_ID'];
    $Title = $_POST['Title'];
    $Content = $_POST['Content'];
    // $Pay = $_POST['Pay'];
    // $H_address = $_POST['H_address'];

    $sql = "INSERT INTO Announcement VALUES ('$Ann_ID','$Title','$Content')";

    mysqli_query($conn,$sql);

    header("Location: index.php");

?>

<!--
            <td>".$row["Lease_ID"]."</td>
			<td>".$row["Rent"]."</td>
			<td>".$row["Daystart"]."</td>
			<td>".$row["Dayline"]."</td>
            <td>".$row["Landlord_ID"]."</td>
            <td>".$row["S_ID"]."</td>
            <td>".$row["Pay"]."</td>
            <td>".$row["H_address"]."</td>
th>租約編號</th>
<th>房租</th>
<th>開始日期</th>
<th>租約到期日</th>
<th>房東ID</th>
<th>學生ID</th>
<th>繳租情形</th>
<th>房屋地址</th>-->