<?php
require "ConnectDB.php";

    $new_Time = $_POST['Time'];
    $new_Situation = $_POST['Situation'];

    $sql = "UPDATE Fix_Equipment SET
            Situation = '$new_Situation'
            WHERE (Time= '$new_Time')";

    mysqli_query($conn,$sql);

    header("Location: dormitory_administrator4_5.php");
?>