<?php
session_start();
include('../../lib/mysqli.php');
$acc=$_POST['edit_acc'];
$pass=$_POST['edit_pass'];
$name=$_POST['edit_name'];
$mail=$_POST['edit_mail'];
$cell=$_POST['edit_cell'];
$data=(new MySQLiDB())->edit_admin($acc,$pass,$name,$mail,$cell);
if($data==0)
    echo  "<script>alert('修改失敗!!!');location.href='../admin/index.php'</script>";
else
{
    echo  "<script>location.href='../admin/index.php'</script>";
}
?>