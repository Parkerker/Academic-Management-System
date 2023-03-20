<?php
session_start();
include('../../lib/mysqli.php');
$id=$_GET['id'];
$data=(new MySQLiDB())->refuse_apply($id);
if($data==1)
    echo  "<script>location.href='index.php'</script>";
else
    echo  "<script>alert('錯誤!!!');location.href='index.php'</script>";
?>