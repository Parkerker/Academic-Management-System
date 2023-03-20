<?php
session_start();
include('../../lib/mysqli.php');
$acc=$_POST['acc'];
$pass=$_POST['pass'];
$data=(new MySQLiDB())->login_user($acc,$pass);
if($data=="failed")
    echo  "<script>alert('登入失敗!!!');location.href='../index.php'</script>";
else
{
    $_SESSION['user_id']=$data[0]['user_id'];
    $_SESSION['user_name']=$data[0]['user_name'];
    echo  "<script>location.href='../index.php'</script>";
}
?>