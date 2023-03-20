<?php
    require "ConnectDB.php";

    $Time = ($_GET['id']);

    $sql = "DELETE FROM Fix_Equipment WHERE Time ='$Time'";

    $result = $conn ->query($sql);

    header("Location: dormitory_administrator4_5.php");

?>