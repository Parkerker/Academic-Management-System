<?php
session_start();
include('../../lib/mysqli.php');
$acc=$_POST['acc'];
$pass=$_POST['pass'];
$data=(new MySQLiDB())->login_admin($acc,$pass);
if($data=="failed")
    echo  "<script>alert('登入失敗!!!');location.href='../../user/index.php'</script>";
else
{
    $_SESSION['admin_account']=$data[0]['account'];
    $_SESSION['admin_name']=$data[0]['name'];
    echo  "<script>location.href='../index.php'</script>";
}
?>