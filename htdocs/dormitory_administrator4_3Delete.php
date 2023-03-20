<?php
    require "ConnectDB.php";

    $Sign_in = ($_GET['id']);

    $sql = "DELETE FROM punch WHERE Sign_in ='$Sign_in'";

    $result = $conn ->query($sql);

    header("Location: dormitory_administrator4_3.php");

?>