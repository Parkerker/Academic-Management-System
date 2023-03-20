<?php
session_start();
include('../../lib/mysqli.php');
$name=$_POST['device_name'];
$data=(new MySQLiDB())->delete_devicetype($name);
if($data==1)
    echo  "<script>location.href='../device/index.php'</script>";
else
    echo  "<script>alert('執行錯誤!!!');location.href='../device/index.php'</script>";
?>