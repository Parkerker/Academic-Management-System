<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<h3><p><a style="font-size: 22px;" href='dormitory_administrator4.php?"'>登入後 管理員</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">簽到記錄</th></tr>

<th>簽到學生</th>
<th>日期</th>
<th colspan="2"> 功能</th>




<?php
	require "ConnectDB.php";
	
	echo"";
	if(empty($_GET['S_ID'])){
		//搜尋資料表course的所有資料
		$sql = "SELECT * FROM punch;";
	}
	else{
		//搜尋資料表course中course_id符合搜尋條件的資料
		$S_ID = $_GET['S_ID'];
		$sql = "SELECT * FROM punch WHERE  S_ID = '$S_ID'";
	}
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
			
            <td><a href='dormitory_administrator4_3EditPage.php?id=".$row["Sign_in"]."'>修改</a></td>
			<td><a href='dormitory_administrator4_3Delete.php?id=".$row["Sign_in"]."'>刪除</a></td>

			
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
<!-- 搜尋特定的課程編號 -->
<form id="form1" name="form1" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">
		<p>學生簽到查詢：
			 <input type="text" name="S_ID"  id="S_ID"  >   <!-- 這 id="" 根本沒用= = -->
		</p>
		<p>
			<input type="submit" value="搜尋">
		</p>
	</form>