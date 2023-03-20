<?php
require "ConnectDB.php";

    $new_Sign_in = $_POST['Sign_in'];
    $new_S_ID = $_POST['S_ID'];

    $sql = "UPDATE punch SET
            S_ID = '$new_S_ID'
            WHERE (Sign_in= '$new_Sign_in')";

    mysqli_query($conn,$sql);

    header("Location: dormitory_administrator4_3.php");
?>