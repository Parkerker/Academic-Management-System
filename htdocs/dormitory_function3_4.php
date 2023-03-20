<h3><p><a style="font-size: 22px;" href='index.php?"'>首頁</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">房間資訊</th></tr>
<th>租約編號</th>
<th>房租</th>
<th>開始日期</th>
<th>租約到期日</th>
<th>房東ID</th>
<th>學生ID</th>
<th>繳租情形</th>
<th>房屋地址</th>



<?php
	require "ConnectDB.php";
	
	echo"<br>40743259 同學，您好" ;
	
	


	//根據搜尋欄位是否有資料決定把哪一個SQL語法儲存在變數中
	if(empty($_GET['Pay'])){
		//搜尋資料表course的所有資料
		$sql = "SELECT * FROM rent;";
	}
	else{
		//搜尋資料表course中course_id符合搜尋條件的資料
		$Pay = $_GET['Pay'];
		$sql = "SELECT * FROM rent WHERE  Pay = '$Pay'";
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
			<td>".$row["Lease_ID"]."</td>
			<td>".$row["Rent"]."</td>
			<td>".$row["Daystart"]."</td>
			<td>".$row["Dayline"]."</td>
            <td>".$row["Landlord_ID"]."</td>
            <td>".$row["S_ID"]."</td>
            <td>".$row["Pay"]."</td>
            <td>".$row["H_address"]."</td>
			
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
		<p>繳租情況查詢：
			 <input type="text" name="Pay"  id="Pay"  >   <!-- 這 id="" 根本沒用= = -->
		</p>
		<p>
			<input type="submit" value="搜尋">
		</p>
	</form>