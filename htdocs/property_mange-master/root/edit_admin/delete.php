<?php
session_start();
include('../../lib/mysqli.php');
$account=$_POST['admin_acc'];
$data=(new MySQLiDB())->delete_admin($account);
if($data==1)
    echo  "<script>location.href='../admin/index.php'</script>";
else
    echo  "<script>alert('執行錯誤!!!');location.href='../admin/index.php'</script>";
?>