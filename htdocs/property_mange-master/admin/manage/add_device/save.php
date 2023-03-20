<?php
session_start();
include('../../../lib/mysqli.php');
$admin=$_SESSION['admin_account'];
$name=$_POST['name'];
$type=$_POST['type'];
$buy_date=$_POST['buy_date'];
$year=$_POST['year'];
$price=$_POST['price'];
$place=$_POST['place'];
$count=$_POST['count'];

$today = getdate();
date("Y/m/d H:i");
$y=$today["year"];
$m=$today["mon"];
$d=$today["mday"];
$h = date("G");
$mi = date("i");
$s = date("s");

$photo=$m.$d.$h.$mi.$s.basename($_FILES["photo1"]["name"]);
$photo2=$m.$d.$h.$mi.$s.basename($_FILES["photo2"]["name"]);
$photo3=$m.$d.$h.$mi.$s.basename($_FILES["photo3"]["name"]);
$guarantee=$m.$d.$h.$mi.$s.basename($_FILES["guarantee"]["name"]);
$operating=$m.$d.$h.$mi.$s.basename($_FILES["operating"]["name"]);
$teach=$m.$d.$h.$mi.$s.basename($_FILES["teach"]["name"]);

if($name!="" && $type!="" && $buy_date!="" && $year!="" && $price!="" && $place!="" && $count!="" && $photo!="" && $photo2!="" && $photo3!="" && $guarantee!="" && $teach!="")
{
    if(!file_exists("../../../upload"))
        mkdir("../../../upload");
    if(!file_exists("../../../upload/".$admin))
        mkdir("../../../upload/".$admin);
    $target_dir = "../../../upload/".$admin."/";

    $target_file1 = $target_dir .$m.$d.$h.$mi.$s.basename($_FILES["photo1"]["name"]);
    $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));

    $target_file12 = $target_dir .$m.$d.$h.$mi.$s.basename($_FILES["photo2"]["name"]);
    $imageFileType12 = strtolower(pathinfo($target_file12,PATHINFO_EXTENSION));

    $target_file13 = $target_dir .$m.$d.$h.$mi.$s.basename($_FILES["photo3"]["name"]);
    $imageFileType13 = strtolower(pathinfo($target_file13,PATHINFO_EXTENSION));

    $target_file2 = $target_dir .$m.$d.$h.$mi.$s.basename($_FILES["guarantee"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file2,PATHINFO_EXTENSION));

    $target_file3 = $target_dir .$m.$d.$h.$mi.$s.basename($_FILES["operating"]["name"]);
    $imageFileType3 = strtolower(pathinfo($target_file3,PATHINFO_EXTENSION));

    $target_file4 = $target_dir .$m.$d.$h.$mi.$s.basename($_FILES["teach"]["name"]);
    $imageFileType4 = strtolower(pathinfo($target_file4,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["photo1"]["tmp_name"], $target_file1) && move_uploaded_file($_FILES["photo2"]["tmp_name"], $target_file12) && move_uploaded_file($_FILES["photo3"]["tmp_name"], $target_file13) && move_uploaded_file($_FILES["guarantee"]["tmp_name"], $target_file2) && move_uploaded_file($_FILES["operating"]["tmp_name"], $target_file3) && move_uploaded_file($_FILES["teach"]["tmp_name"], $target_file4)) {
        $data=(new MySQLiDB())->add_device($admin,$type,$name,$buy_date,$year,$price,$place,$count,$photo,$photo2,$photo3,$guarantee,$operating,$teach);
    } else {
        $data=0;
    }
    if($data==1)
        echo  "<script>alert('新增成功!!!');location.href='index.php'</script>";
    else if($data==0)
        echo  "<script>alert('新增失敗!!!');location.href='index.php'</script>";
}
else
    echo  "<script>alert('請勿留空!!!');location.href='index.php'</script>";
?>