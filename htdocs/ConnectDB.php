<?php
	$server = "localhost";
	$username = "user";
	$password="password";
	$dbname="dormitory2"; //university_backup

	
	//建立連線
	$conn=new mysqli($server,$username,$password,$dbname);
	
	//設定連線的編碼
	mysqli_query($conn,"SET NAMES 'UTF8'");

	//確認連線是否成功
	if($conn->connect_error){
		die("連線失敗：".$conn->connect_error."<br>");
	}
	else{
		echo "<br>"; //echo "連線成功<br>";
	}
?>