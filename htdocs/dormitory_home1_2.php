<h3><p><a style="font-size: 22px;" href='index.php?"'>首頁</a></p>
<div class="modal fade" id="loginuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                
                
            </div>
            <form action="login/login.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">帳號</label>
                        <input type="text" class="form-control" id="acc" name="acc">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密碼</label>
                        <input type="password" class="form-control" id="pass" name="pass">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('page_content').src='create/index.php'">註冊</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="location.href='index.php'">取消</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='index.php'">登入</button>
                </div>
            </form>
        </div>
    </div>
</div
