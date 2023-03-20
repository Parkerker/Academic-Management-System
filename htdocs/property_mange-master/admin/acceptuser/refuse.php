<?php
session_start();
include('../../lib/mysqli.php');
$user_id=$_POST['user_id'];
$data=(new MySQLiDB())->refuse_user($user_id);
if($data==1)
    echo  "<script>location.href='index.php'</script>";
else
    echo  "<script>alert('錯誤!!!');location.href='index.php'</script>";
?>