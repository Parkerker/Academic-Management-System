<!-- Modal -->
<div class="modal fade" id="editadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">編輯管理者</h5>
            </div>
            <form action="../edit_admin/save.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">帳號</label>
                        <input type="text" class="form-control"  name="edit_acc" readonly>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1">密碼</label>
                        <input type="text" class="form-control"  name="edit_pass">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">姓名</label>
                        <input type="text" class="form-control"  name="edit_name">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">信箱</label>
                        <input type="text" class="form-control" name="edit_mail">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">手機</label>
                        <input type="text" class="form-control"  name="edit_cell">
                    </div>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary">儲存</button>
                </div>
            </form>
        </div>
    </div>
</div>