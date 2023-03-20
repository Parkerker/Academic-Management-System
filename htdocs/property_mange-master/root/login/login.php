<?php
session_start();
include('../../lib/mysqli.php');
$acc=$_POST['acc'];
$pass=$_POST['pass'];
$data=(new MySQLiDB())->login_root($acc,$pass);
if($data==1)
{
    $_SESSION['is_root']='1';
    echo  "<script>location.href='../../root/index.php'</script>";
}
else
    echo  "<script>alert('登入失敗!!!');location.href='../../user/index.php'</script>";
?>