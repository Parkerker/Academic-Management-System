<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<h3><p><a style="font-size: 22px;" href='index.php?"'>學舍管理平台首頁</a></p>


<h3><table class="table" border="1">
<tr><th colspan="10">宿舍公告</th></tr>
<th>公告清單編號</th>
<th>公告標題</th>
<th>詳細內容</th>

<?php
	require "ConnectDB.php";
	
	echo"" ;
	

		$sql = "SELECT * FROM announcement;";
	

	//把$sql這個字串拿去做查詢，並將結果儲存在$result裡
	$result = $conn ->query($sql);

	//判斷是否有查詢到資料
	if($result->num_rows>0){
		//輸出資料，每次呼叫$row = $result->fetch_assoc()都會取出一列的資料
		while($row=$result->fetch_assoc()){
			//用$row["欄位名稱"]來取得資料
			echo "
			<tr>
			<td>".$row["Ann_ID"]."</td>
			<td>".$row["Title"]."</td>
			<td>".$row["Content"]."</td>

			
			</tr>";

			/*echo "課程編號:".$row["course_id"]."科目:".$row["title"].
				"科系".$row["dept_name"]."學分:".$row["credits"]."<br>";*/
		}
	}else{
		echo "0 results";
	}
	
	//關閉與資料庫的連線
	$conn->close();
	
	
?>
<!--3.登入後學生功能-->
<p><a style="font-size: 30px;">登入後學生功能</a></p>

			<p><a href='dormitory_student5_4.php?"'>修改帳戶資訊</a></p>
			<p><a href='dormitory_function3_5.php?"'>查看我的宿友</a></p>
			<p><a href='dormitory_function3_1.php?"'>簽到查詢</a></p>
			<p><a href='dormitory_function3_2.php?"'>可住宿房間</a></p>
			<p><a href='dormitory_function3_3.php?"'>新增設備報修</a></p>
			<p><a href='dormitory_student5_2AddPage.php?"'>登記住宿訊息</a></p>
			<!-- <p><a href='dormitory_function3_4.php?"'>繳租情況</a></p> -->
			<!-- <p><a href='dormitory_function3_5.php?"'>租約到期時間</a></p> -->


