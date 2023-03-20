<h3><p><a style="font-size: 22px;" href='dormitory_nearby2.php?"'>虎科大附近房屋</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">房屋列表</th></tr>
<th>地址</th>
<th>房東編號</th>
<th>類型</th>
<th>補充內容</th>




<?php
	require "ConnectDB.php";
	
	echo"<br>40743259 同學，您好" ;
	
	
	$sql = "SELECT * FROM houses;";
/*
	//根據搜尋欄位是否有資料決定把哪一個SQL語法儲存在變數中
	if(empty($_GET['course_id'])){
		//搜尋資料表course的所有資料
		$sql = "SELECT * FROM course;";
	}
	else{
		//搜尋資料表course中course_id符合搜尋條件的資料
		$course_id = $_GET['course_id'];
		$sql = "SELECT * FROM course WHERE course_id = '$course_id'";
	}
*/
	//把$sql這個字串拿去做查詢，並將結果儲存在$result裡
	$result = $conn ->query($sql);

	//判斷是否有查詢到資料
	if($result->num_rows>0){
		//輸出資料，每次呼叫$row = $result->fetch_assoc()都會取出一列的資料
		while($row=$result->fetch_assoc()){
			//用$row["欄位名稱"]來取得資料
			echo "
			<tr>
			<td>".$row["Address"]."</td>
			<td>".$row["Landlord_ID"]."</td>
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