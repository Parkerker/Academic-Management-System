<?php
session_start();
include('../../../lib/mysqli.php');
$id=$_POST['id1'];
$count=$_POST['count1'];
$fd=$_POST['apply_date'];
$sd=$_POST['return_date'];
if($fd!='' && $sd!='') {
    $data = (new MySQLiDB())->get_id_device($id);
    if ($data[0]['count'] < intval($count))
        echo "<script>alert('數量不足');location.href='../index.php';</script>";
    else {
        $data2 = (new MySQLiDB())->add_apply($id, $_SESSION['user_id'], $count, $fd, $sd);
        if ($data2 == 1)
            echo "<script>alert('申請成功');location.href='../index.php';</script>";
        else if ($data2 == 0)
            echo "<script>alert('執行錯誤');location.href='../index.php';</script>";
        else if ($data2 == 2)
            echo "<script>alert('數量不足');location.href='../index.php';</script>";
    }
}
else
    echo "<script>alert('請勿留空');location.href='../index.php';</script>";
?>