<?php
session_start();
include('../../lib/mysqli.php');
$user_id=$_POST['user_id'];
$data=(new MySQLiDB())->delete_user($user_id);
if($data==1)
    echo  "<script>location.href='../user/index.php'</script>";
else
    echo  "<script>alert('執行錯誤!!!');location.href='../user/index.php'</script>";
?>