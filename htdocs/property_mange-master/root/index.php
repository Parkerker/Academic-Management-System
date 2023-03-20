<?php include('../include/bottom.php');include('login/index.php');include('../lib/mysqli.php'); ?>
<body>
<div class="container-fluid">
    <div class="row justify-content-between pt-md-3 border" style="height: 150px;background-color:#BEBEBE">
        <div class="col-md-6 col-12">
            <img src="../image/nfu_logo.png" alt="財產管理系統">
        </div>
        <div class="col-md-6 col-12" style="text-align: right">
            <?php if(empty($_SESSION['is_root'])){echo "<script>location.href='../user/index.php';</script>";}else{ ?>
                <span style="font-size: 24px"><?php echo '系統管理者:root' ?></span>
                <button type="button" class="btn btn-outline-dark" onclick="location.href='login/logout.php'" style="background-color: #FCFCFC">登出</button>
            <?php } ?>
        </div>
    </div>
    <div class="row border">
        <div class="col-12 marquee_text pt-1" style="height: 20px;background-color:#8E8E8E;"></div>
    </div>
    <div class="row">
        <div class="col-md-2 col-12 border" style="height: 800px;background-color:#BEBEBE;">
            <?php include('menu/index.php')?>
        </div>
        <div class="col-md-10 col-12 border" style="height: 800px;background-color:#FCFCFC;">
            <iframe src="user/index.php" id="page_content" name="page_content" frameborder="0" width="100%" height="100%"></iframe>
        </div>
    </div>
</div>
</body>
