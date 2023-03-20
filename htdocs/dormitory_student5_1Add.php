<?php
    require "ConnectDB.php";
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    // $Room_number = $_POST['Room_number'];
    $Password = $_POST['Password'];

    $sql = "INSERT INTO Student VALUES ('$ID','$Name','$Phone','$Password')";

    mysqli_query($conn,$sql);

    header("Location: index.php");

?>