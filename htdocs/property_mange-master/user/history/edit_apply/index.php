<!-- Modal -->
<head>
    <script src="gijgo.min.js" type="text/javascript"></script>
    <link href="gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<div class="modal fade" id="editapply" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form action="edit_apply/edit.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">修改申請</h5>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">申請單號</label>
                            <input type="text" class="form-control"  name="id" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">設備ID</label>
                            <input type="text" class="form-control"  name="id1" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">設備類型</label>
                            <input type="text" class="form-control"  name="type1" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputPassword1">設備名稱</label>
                            <input type="text" class="form-control"  name="name1" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">數量</label>
                            <input type="text" class="form-control"  name="count1">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">借用日期</label>
                            <div class ="form-group txx">
                                <input id="apply_date" name="apply_date" width="400" />
                                <script>
                                    $('#apply_date').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">預計歸還日期</label>
                            <div class ="form-group txx">
                                <input id="return_date" name="return_date"  width="400px" />
                                <script>
                                    $('#return_date').datepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">關閉</button>
                        <button type="submit" class="btn btn-primary">更新</button>
                    </div>
                </div>
        </form>
    </div>
</div>