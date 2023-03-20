<h3><p><a style="font-size: 22px;" href='dormitory_function3.php?"'>登入後學生功能</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">房間資訊</th></tr>
<th>房間編號</th>
<th>樓層</th>
<th>房間號碼</th>
<th>容納人數</th>




<?php
	require "ConnectDB.php";
	
	echo"可住宿房間";
	
	
	$sql = "SELECT * FROM Room ";
	// select ID,Name,Room_ID from Student,Stay where Student.ID=Stay.S_ID;

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
			<td>".$row["Room_ID"]."</td>
			<td>".$row["Floor"]."</td>
            <td>".$row["Room_number"]."</td>
            <td>".$row["People"]."</td>

			
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