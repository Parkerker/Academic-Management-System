<?php
session_start();
include('../../lib/mysqli.php');
$id=$_GET['id'];
$data=(new MySQLiDB())->accept_apply($id);
if($data==1)
    echo  "<script>location.href='index.php'</script>";
else if($data==2)
    echo  "<script>alert('剩餘數量不足!!!');location.href='index.php'</script>";
else
    echo  "<script>alert('錯誤!!!');location.href='index.php'</script>";
?>