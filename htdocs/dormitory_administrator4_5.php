<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<h3><p><a style="font-size: 22px;" href='dormitory_administrator4.php?"'>登入後 管理員</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">設備報修</th></tr>
<th>報修學生</th>
<th>設備ID</th>
<th>申請時間</th>
<th>報修情形</th>
<th>設備問題描述</th>




<?php
	require "ConnectDB.php";
	
	echo"修改學生報修的物品";
	
	
	$sql = "SELECT * FROM Fix_Equipment";
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
			<td>".$row["S_ID"]."</td>
			<td>".$row["Equip_ID"]."</td>
			<td>".$row["Time"]."</td> 
            <td>".$row["Situation"]."</td>
            <td>".$row["Content"]."</td>

			<td><a href='dormitory_administrator4_5EditPage.php?id=".$row["Time"]."'>修改</a></td>
			<td><a href='dormitory_administrator4_5Delete.php?id=".$row["Time"]."'>刪除</a></td>
			
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

<!-- <input type="button" value="新增報修" onclick="location.href='dormitory_function3_3AddPage.php'"> -->