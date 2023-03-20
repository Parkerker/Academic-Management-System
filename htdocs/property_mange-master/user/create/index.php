<?php include('../../include/bottom2.php') ?>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
    .txx{
        font-size: 20px;
        font-family: 標楷體;
    }
</style>
<body>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <span class="area_">註冊帳號</span>
        </div>
    </div>
    <p>
    <div class="row" style="text-align: center">
        <form action="create.php" method="post">
            <div class="form-group row">
                <label for="user_id" class="col-md-5  col-form-label" style="text-align: right">學號</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="user_id" name="user_id">
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="form-group row">
                <label for="user_name" class="col-md-5 pt-md-3 col-form-label" style="text-align: right">姓名</label>
                <div class="col-md-3 pt-md-3">
                    <input type="text" class="form-control" id="user_name" name="user_name">
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="form-group row">
                <label for="user_pass" class="col-md-5 pt-md-3 col-form-label" style="text-align: right">密碼</label>
                <div class="col-md-3 pt-md-3">
                    <input type="text" class="form-control" id="user_pass" name="user_pass">
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="form-group row">
                <label for="user_mail" class="col-md-5 pt-md-3 col-form-label" style="text-align: right">信箱</label>
                <div class="col-md-3 pt-md-3">
                    <input type="text" class="form-control" id="user_mail" name="user_mail">
                </div>
                <div class="col-md-4 pt-md-3"></div>
            </div>
            <div class="form-group row">
                <label for="user_cell" class="col-md-5 pt-md-3 col-form-label" style="text-align: right">手機</label>
                <div class="col-md-3 pt-md-3">
                    <input type="text" class="form-control" id="user_cell" name="user_cell">
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="form-group row mt-md-4">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">註冊</button>
                </div>
            </div>
        </form>
    </div>
</body>

