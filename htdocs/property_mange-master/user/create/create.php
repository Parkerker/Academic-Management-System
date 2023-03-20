<?php
session_start();
include('../../lib/mysqli.php');
$user_name=$_POST['user_name'];
$user_id=$_POST['user_id'];
$user_pass=$_POST['user_pass'];
$user_mail=$_POST['user_mail'];
$user_cell=$_POST['user_cell'];
if($user_name!="" && $user_id!="" && $user_cell!="" && $user_mail!="" && $user_pass!="")
{
    $data=(new MySQLiDB())->create_user($user_id,$user_name,$user_pass,$user_mail,$user_cell);
    if($data==1)
        echo  "<script>location.href='../precautions/index.php'</script>";
    else if($data==2)
        echo  "<script>alert('使用者帳號已存在!!!');location.href='index.php'</script>";
    else if($data==3)
        echo  "<script>alert('請勿重複進行帳號申請!!!');location.href='index.php'</script>";
}
else
    echo  "<script>alert('請勿留空!!!');location.href='index.php'</script>";
?>