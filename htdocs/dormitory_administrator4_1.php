<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<h3><p><a style="font-size: 22px;" href='dormitory_administrator4.php?"'>登入後 管理員</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">學生註冊名單</th></tr>
<th>學號</th>
<th>姓名</th>
<th>電話</th>
<!-- <th>房間號碼</th>  <td>".$row["Room_number"]."</td> -->
<th>密碼</th>




<?php
	require "ConnectDB.php";
	
	echo"審核學生的註冊訊息";
	
		$sql = "SELECT * FROM student;";

	//把$sql這個字串拿去做查詢，並將結果儲存在$result裡
	$result = $conn ->query($sql);

	//判斷是否有查詢到資料
	if($result->num_rows>0){
		//輸出資料，每次呼叫$row = $result->fetch_assoc()都會取出一列的資料
		while($row=$result->fetch_assoc()){
			//用$row["欄位名稱"]來取得資料
			echo "
			<tr>
			<td>".$row["ID"]."</td>
			<td>".$row["Name"]."</td>
			<td>".$row["Phone"]."</td>
           
            <td>".$row["Password"]."</td>

			
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
<br>


<!--房東註冊名單-->
<!-- <h3><table class="table" border="1">
<tr><th colspan="10">房東註冊名單</th></tr>
<th>編號</th>
<th>密碼</th>
<th>房東姓名</th>
<th>電話</th>
<th>簽名檔</th>

<br>
<br>
<br>
< ?php
	require "ConnectDB.php";
	
	echo"";
	
		$sql = "SELECT * FROM landlord;";


	//把$sql這個字串拿去做查詢，並將結果儲存在$result裡
	$result = $conn ->query($sql);

	//判斷是否有查詢到資料
	if($result->num_rows>0){
		//輸出資料，每次呼叫$row = $result->fetch_assoc()都會取出一列的資料
		while($row=$result->fetch_assoc()){
			//用$row["欄位名稱"]來取得資料
			echo "
			<tr>
			<td>".$row["ID"]."</td>
            <td>".$row["Password"]."</td>
			<td>".$row["Name"]."</td>
			<td>".$row["Phone"]."</td>
            <td>".$row["Signature_line"]."</td>
            

			
			</tr>";

			/*echo "課程編號:".$row["course_id"]."科目:".$row["title"].
				"科系".$row["dept_name"]."學分:".$row["credits"]."<br>";*/
		}
	}else{
		echo "0 results";
	}
	//關閉與資料庫的連線
	$conn->close();
	
?> -->