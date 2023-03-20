<?php
    require "ConnectDB.php";
   
    $S_ID = $_POST['S_ID'];
    $Equip_ID = $_POST['Equip_ID'];
    $Time = $_POST['Time'];
    $Situation = $_POST['Situation'];
    $Content = $_POST['Content'];

    $sql = "INSERT INTO Fix_Equipment(S_ID,Equip_ID,Time,Situation,Content)
            VALUES ('$S_ID','$Equip_ID','$Time','$Situation','$Content')";

    mysqli_query($conn,$sql);

    header("Location: dormitory_function3_3.php");

?>

