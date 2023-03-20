<?php
    require "ConnectDB.php";
    $ID = $_POST['ID'];
    $Password = $_POST['Password'];
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
    $Signature_line = $_POST['Signature_line'];

    $sql = "INSERT INTO Landlord VALUES ('$ID','$Password','$Name','$Phone','$Signature_line')";

    mysqli_query($conn,$sql);

    header("Location: index.php");

?>
