<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<h3><p><a style="font-size: 22px;" href='dormitory_administrator4.php?"'>登入後管理員</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">設備清單</th></tr>
<th>設備ID</th>
<th>設備名稱</th>
<th>設備數量</th>





<?php
	require "ConnectDB.php";
	
	echo"查看設備清單" ;
	
	$sql = "SELECT * FROM Equipment";

	//把$sql這個字串拿去做查詢，並將結果儲存在$result裡
	$result = $conn ->query($sql);

	//判斷是否有查詢到資料
	if($result->num_rows>0){
		//輸出資料，每次呼叫$row = $result->fetch_assoc()都會取出一列的資料
		while($row=$result->fetch_assoc()){
			//用$row["欄位名稱"]來取得資料
			echo "
			<tr>
			<td>".$row["Equip_ID"]."</td>
			<td>".$row["Equip_name"]."</td>
            <td>".$row["Equip_count"]."</td>
			

			
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
