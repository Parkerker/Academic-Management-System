<?php include('../../lib/mysqli.php');
$marquee_text=$_POST['marquee_text'];
$precautions=$_POST['precautions'];
$data=(new MySQLiDB())->root_setting($marquee_text,$precautions);
if($data=="failed")
    echo  "<script>alert('修改失敗!!!');location.href='index.php'</script>";
else
{
    echo  "<script>location.href='index.php'</script>";
}
?>
