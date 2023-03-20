<?php
require "ConnectDB.php";

    $new_ID = $_POST['ID'];
    $new_Name = $_POST['Name'];
    $new_Phone = $_POST['Phone'];
    // $new_Room_number = $_POST['Room_number'];
    $new_Password = $_POST['Password'];

    $sql = "UPDATE student SET
            Name = '$new_Name',
            Phone = '$new_Phone',
            -- Room_number = '$new_Room_number',
            Password = '$new_Password'
            WHERE (ID = '$new_ID')";

    mysqli_query($conn,$sql);

    header("Location: dormitory_student5_4.php");
?>

