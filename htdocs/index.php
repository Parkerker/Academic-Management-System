<table class="table" border="1">
<!--<tr><th colspan="10">課程資料</th></tr>
<th>學號</th>
<th>姓名</th>
<th>電話</th>
<th>房間編號</th>
<th>密碼</th>
<th colspan="2"> 功能</th>-->
<h3><p><a style="font-size: 22px;" href='index.php?"'>學舍管理平台首頁</a></p>

<?php
	require "ConnectDB.php";
	
	echo"";
	// <br>學號：40743259" ;

	

	
	//$sql = "SELECT * FROM student;";
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
	//$result = $conn ->query($sql);

	//判斷是否有查詢到資料
	/*if($result->num_rows>0){
		//輸出資料，每次呼叫$row = $result->fetch_assoc()都會取出一列的資料
		while($row=$result->fetch_assoc()){
			//用$row["欄位名稱"]來取得資料
			echo "
			<tr>
			<td>".$row["ID"]."</td>
			<td>".$row["Name"]."</td>
			<td>".$row["Phone"]."</td>
			<td>".$row["Room_number"]."</td>
			<td>".$row["Password"]."</td>
			<td><a href='EditCoursePage.php?id=".$row["ID"]."'>修改</a></td>
			<td><a href='DeleteCourse.php?id=".$row["ID"]."'>刪除</a></td>
			</tr>";

			echo "課程編號:".$row["course_id"]."科目:".$row["title"].
				"科系".$row["dept_name"]."學分:".$row["credits"]."<br>";
		}
	}else{
		echo "0 results";
	}*/
	//關閉與資料庫的連線
	$conn->close();
	
?>
<!--公告部分-->

<div >
            <marquee height="50" style="color:#000000; font-size: 30px;">🏡~~歡迎使用學舍管理系統~~🏡</marquee>
</div>

<h1><strong><span>公告</span></strong></h1>

<h3>
<span><strong><br></strong></span><strong>
<img src="https://house.nfu.edu.tw/images/new.gif"/>
<span>帳號用戶需自行將儲存空間（雲端硬碟、google信箱和google相簿等）調整至3GB（含）以下</span>


<div class="col-lg-3 pl-1 pr-0">
            <div class="rh-label-inverse-content border-indigo overflow-auto"  style="height: 200px;">
                <h5></h5>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2022-06-06</span>&nbsp;
                         <img src="https://house.nfu.edu.tw/images/new.gif"/>                         <div>
                            <a href="https://house.nfu.edu.tw/announce/3852">110年教育部學生校外賃居安全宣導海報</a>
                        </div>
                    </div>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2022-02-29</span>&nbsp;
                                                <div>
                            <a>因應疫情防疫措施</a>
                        </div>
                    </div>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2021-12-12</span>&nbsp;
                                                <div>
                            <a>校外租屋區域環境介紹</a>
                        </div>
                    </div>
                                    
                            </div>

        </div>

<!-- 搜尋特定的課程編號 -->
	<form id="form1" name="form1" method="get" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> ">

<!--1.基本功能-->
<p><a style="font-size: 30px;">基本功能</a></p> 
<!-- href='dormitory_home1.php?" -->
			<p><a href='dormitory_student5_1AddPage.php?"'>學生註冊帳戶</a></p>
			<!-- <p><a href='dormitory_landlord6_1AddPage.php?"'>房東註冊帳戶</a></p> -->
			<!-- <p><a href='dormitory_home1_2.php?"'>登入/註冊</a></p> -->
			<p><a href='dormitory_home1_4.php?"'>問題與回答</a></p>
			<!-- <p><a href='dormitory_home1_5.php?"'>查詢學校</a></p> -->
			<!-- <p><a href='dormitory_home1_6.php?"'>系統功能</a></p> -->
			


<!--2.各學校附近房屋-->
<!-- <p><a style="font-size: 30px;" href='dormitory_nearby2.php?"'>虎科大附近房屋</a></p> -->
			<!-- <p><a href='dormitory_nearby2_1.php?"'>系統公告</a></p>
			<p><a href='dormitory_nearby2_2.php?"'>房屋列表</a></p>
			<p><a href='dormitory_nearby2_3.php?"'>房屋類型查詢</a></p> -->
<br>
<p><a style="font-size: 30px;">登入後功能</a></p> 
<!--3.登入後學生功能-->
<p><a style="font-size: 30px;" href='dormitory_function3.php?"'>登入後學生功能</a></p>
			<!-- <p><a href='dormitory_student5_4.php?"'>修改帳戶資訊</a></p>
			<p><a href='dormitory_function3_1.php?"'>簽到查詢</a></p>
			<p><a href='dormitory_function3_2.php?"'>房間資訊與繳租情況</a></p>
			<p><a href='dormitory_function3_3.php?"'>設備報修</a></p>
			<p><a href='dormitory_student5_2AddPage.php?"'>登記住宿訊息</a></p> -->

			<!-- <p><a href='dormitory_function3_4.php?"'>繳租情況</a></p> -->
			<!-- <p><a href='dormitory_function3_5.php?"'>租約到期時間</a></p> -->

<!--4.登入後 管理員-->
<p><a style="font-size: 30px;" href='dormitory_administrator4.php?"'>登入後 管理員</a></p>
			<!-- <p><a href='dormitory_administrator4_1.php?"'>查看房東及學生的註冊訊息</a></p>
			<p><a href='dormitory_administrator4_5.php?"'>查看學生報修的物品</a></p>
			<p><a href='dormitory_administrator4_3.php?"'>學生簽到審核修改刪除</a></p> -->

			<!-- <p><a href='dormitory_administrator4_4.php?"'>發布公告</a></p> -->
			<!-- <p><a href='dormitory_administrator4_2.php?"'>同意或否決房東上傳的資料</a></p> -->
			

<!--5.登入後 學生-->
<!-- <p><a style="font-size: 30px;" href='dormitory_student5.php?"'>登入後 學生</a></p> -->
			<!-- <p><a href='dormitory_student5_1.php?"'>註冊帳戶</a></p> -->
			<!-- <p><a href='dormitory_student5_2.php?"'>登記住宿訊息</a></p> -->
			<!-- <p><a href='dormitory_student5_3.php?"'>報修壞的設備</a></p> -->
			<!-- <p><a href='dormitory_student5_4.php?"'>修改帳戶資訊</a></p> -->
			<!-- <p><a href='dormitory_student5_5.php?"'>查詢出租類型</a></p> -->
			<!-- <p><a href='dormitory_student5_6.php?"'>確認房租資訊</a></p> -->

<!--6.登入後 房東-->
<!-- <p><a style="font-size: 30px;" href='dormitory_landlord6.php?"'>登入後 房東</a></p> -->
			<!-- <p><a href='dormitory_landlord6_1.php?"'>房東註冊帳戶</a></p> -->
			
			<!-- <p><a href='dormitory_landlord6_2.php?"'>申請或修改房屋資訊</a></p>
			<p><a href='dormitory_landlord6_3.php?"'>查詢繳租情況</a></p> -->
	
	</form>