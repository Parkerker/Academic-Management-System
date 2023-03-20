<?php
session_start();
include('../../lib/mysqli.php');
$name=$_POST['device_name'];
if($name!="")
{
    $data=(new MySQLiDB())->add_devicetype($name);
    if($data==1)
        echo  "<script>location.href='../device/index.php'</script>";
    else if($data==0)
        echo  "<script>alert('新增失敗!!!');location.href='../device/index.php'</script>";
    else if($data==2)
        echo  "<script>alert('請勿重複進行類型新增!!!');location.href='../device/index.php'</script>";
}
else
    echo  "<script>alert('請勿留空!!!');location.href='../device/index.php'</script>";
?>