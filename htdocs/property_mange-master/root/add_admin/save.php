<?php
session_start();
include('../../lib/mysqli.php');
$acc=$_POST['add_acc'];
$pass=$_POST['add_pass'];
$name=$_POST['add_name'];
$mail=$_POST['add_mail'];
$cell=$_POST['add_cell'];
if($name!="" && $acc!="" && $pass!="" && $mail!="" && $cell!="")
{
    $data=(new MySQLiDB())->add_admin($acc,$pass,$name,$mail,$cell);
    if($data==1)
        echo  "<script>location.href='../admin/index.php'</script>";
    else if($data==0)
        echo  "<script>alert('新增失敗!!!');location.href='../admin/index.php'</script>";
    else if($data==2)
        echo  "<script>alert('請勿重複進行帳號新增!!!');location.href='../admin/index.php'</script>";
}
else
    echo  "<script>alert('請勿留空!!!');location.href='../admin/index.php'</script>";
?>