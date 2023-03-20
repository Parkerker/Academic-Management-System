<?php
include('../../../../lib/mysqli.php');
$id=$_GET['id'];
$data=(new MySQLiDB())->delete_device($id);
if($data==1)
    echo "<script>alert('報廢成功!!!');location.href='../index.php'</script>";
else
    echo "<script>alert('執行錯誤!!!');location.href='../index.php'</script>";
?>