<!-- Modal -->
<div class="modal fade" id="loginuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">使用者登入</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="document.getElementById('page_content').src='create/index.php'">註冊</button>
            </div>
            <form action="login/login.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">帳號(學號)</label>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">登入</button>
                </div>
            </form>
        </div>
    </div>
</div>