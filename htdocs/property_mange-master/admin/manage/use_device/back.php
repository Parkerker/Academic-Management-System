<?php
include('../../../lib/mysqli.php');
session_start();
$id=$_GET['id'];
$data=(new MySQLiDB())->add_history($_SESSION['admin_account'],$id);
if($data==1)
    echo "<script>alert('成功歸還');location.href='../index.php';</script>";
else
    echo "<script>alert('執行錯誤');location.href='../index.php';</script>";
?>