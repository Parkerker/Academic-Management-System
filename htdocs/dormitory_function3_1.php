<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<h3><p><a style="font-size: 22px;" href='dormitory_function3.php?"'>登入後學生功能</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">簽到記錄</th></tr>
<th>簽到學生</th>
<th>簽到日期</th>





<?php
	require "ConnectDB.php";
	
	echo"簽到查詢" ;
	
	$sql = "SELECT * FROM punch where S_ID=40743259;";

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
			<td>".$row["Sign_in"]."</td>
			

			
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
