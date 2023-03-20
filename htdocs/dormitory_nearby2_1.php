<h3><p><a style="font-size: 22px;" href='dormitory_nearby2.php?"'>虎科大附近房屋</a></p>
<h3><table class="table" border="1">
<tr><th colspan="10">房屋系統公告</th></tr>
<th>公告清單編號</th>
<th>公告標題</th>
<th>詳細內容</th>
<th>發布人</th>




<?php
	require "ConnectDB.php";
	
	echo"<br>40743259 同學，您好" ;
	
	
	$sql = "SELECT * FROM Announcement;";
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
			<td>".$row["Ann_ID"]."</td>
			<td>".$row["Title"]."</td>
			<td>".$row["Content"]."</td>
			<td>".$row["Adm_ID"]."</td>
			
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






<!-- <h3><p><a style="font-size: 22px;" href='index.php?"'>首頁</a></p>


<div >
            <marquee height="50" style="color:#000000; font-size: 30px;">!!!~~歡迎使用學舍管理系統~~!!!</marquee>
</div>

<h1><strong><span>系統公告</span></strong></h1>

<h3><span>1. 學生</span><span  >【登錄及基本功能】</span> <span>說明<br></span>

<strong><span  >2.</span><span>【密碼忘記】</span><span  >，重設說明</span></strong


<span><strong><br></strong></span><strong> -->
<!--
<span  >3. </span><span>【輸入】</span><span  >操作說明：</span></strong><span  ><strong></strong><br>　</span><span  >(1).成績輸入說明，在第1~2頁 (2).平時成績說明在第3~4頁 (3).實習成績說明，在第5頁</span><span  ><br></span>
-->

<!--
<strong><span  >3.</span><span>【申請住屋】</span><span  >房東輸入操作說明</span></strong>



<div class="col-lg-3 pl-1 pr-0">
            <div class="rh-label-inverse-content border-indigo overflow-auto"  style="height: 200px;">
                <h5></h5>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2022-06-06</span>&nbsp;
                         <img src="https://house.nfu.edu.tw/images/new.gif"/>                         <div>
                            <a href="https://house.nfu.edu.tw/announce/3852">住宅租賃契約應記載及不得記載事項</a>
                        </div>
                    </div>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2022-05-05</span>&nbsp;
                         <img src="https://house.nfu.edu.tw/images/new.gif"/>                         <div>
                            <a>帳號用戶需自行將儲存空間（雲端硬碟、google信箱和google相簿等）調整至3GB（含）以下</a>
                        </div>
                    </div>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2022-03-03</span>&nbsp;
                                                <div>
                            <a>3/15(二) 伺服器進行例行維護，系統將暫停服務 08:00-18:00</a>
                        </div>
                    </div>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2022-02-29</span>&nbsp;
                                                <div>
                            <a>111年2月12日(六)-2月13日(日)配合校園工程施作學校暫停供電，系統將暫停服務</a>
                        </div>
                    </div>
                                    <div class="rh-anns mb-1"><span class="rh-anns-date">2021-12-12</span>&nbsp;
                                                <div>
                            <a>110年教育部學生校外賃居安全宣導海報-詳版(110.12更新版)</a>
                        </div>
                    </div>
                                    
                            </div>

        </div>

-->