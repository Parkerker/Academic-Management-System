<?php include('../../../include/bottom3.php');include('../../../lib/mysqli.php'); ?>
<head>
    <script src="gijgo.min.js" type="text/javascript"></script>
    <link href="gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<style>
    .area_{
        font-size: 40px;
        font-family: 標楷體;
    }
    .txx{
        font-size: 30px;
        font-family: 標楷體;
    }
    .tx2{
        font-size: 25px;
        font-family: 標楷體;
    }
</style>
<body>
    <div class="row">
        <div class="col-md-12" style="text-align: center">
            <span class="area_">登錄設備</span>
        </div>
    </div>
    <form action="save.php" method="POST"  enctype="multipart/form-data">
        <div class="row pt-md-5" >
            <div class="col-md-3 txx"style="text-align: center">
                設備類型
            </div>
            <div class="col-md-3">
                <div class="form-group txx">
                    <select class="form-control txx" name="type" style="width: 87%">
                       <?php $data=(new MySQLiDB())->get_devicetype();for($i=0;$i<sizeof($data);$i++){ ?>
                        <option value="<?php echo $data[$i]['name']; ?>"><?php echo $data[$i]['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3 tx2">
                照片(至少三張)
            </div>
            <div class="col-md-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="photo1" accept="image/*">
                </div>
                <div class="custom-file pt-md-3">
                    <input type="file" class="custom-file-input" name="photo2" accept="image/*">
                </div>
                <div class="custom-file pt-md-3">
                    <input type="file" class="custom-file-input" name="photo3" accept="image/*">
                </div>
            </div>
        </div>
        <div class="row pt-md-4 " >
            <div class="col-md-3 txx"style="text-align: center">
                <label>設備名稱</label>
            </div>
            <div class="col-md-3">
                <div class="form-group txx">
                    <input type="text" width="50px" name="name">
                </div>
            </div>
            <div class="col-md-3 txx">
                保證書
            </div>
            <div class="col-md-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="guarantee" accept="image/*">
                </div>
            </div>
        </div>
        <div class="row pt-md-4" >
            <div class="col-md-3 txx"style="text-align: center">
                購買日期
            </div>
            <div class="col-md-3 txx">
                <div class ="form-group txx">
                    <input id="device_buytime" name="buy_date" />
                    <script>
                        $('#device_buytime').datepicker({
                            uiLibrary: 'bootstrap4'
                        });
                    </script>
                </div>
            </div>
            <div class="col-md-3 txx">
                操作說明
            </div>
            <div class="col-md-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="operating" accept=".docx,.doc,.txt">
                </div>
            </div>
        </div>
        <div class="row pt-md-4 " >
            <div class="col-md-3 txx" style="text-align: center">
                <label>使用年限</label>
            </div>
            <div class="col-md-3">
                <div class="form-group txx" id="device_year">
                    <input type="text" width="50px" name="year">
                </div>
            </div>
            <div class="col-md-3 txx">
                教學影片
            </div>
            <div class="col-md-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="teach" accept="audio/*">
                </div>
            </div>
        </div>
        <div class="row pt-md-4">
            <div class="col-md-3 txx"style="text-align: center">
                <label>設備單價</label>
            </div>
            <div class="col-md-3">
                <div class="form-group txx" id="device_price">
                    <input type="text" width="50px" name="price">
                </div>
            </div>
            <div class="col-md-3 txx">
                <label>擺放地點</label>
            </div>
            <div class="col-md-3">
                <div class="form-group txx" id="device_place">
                    <input type="text" width="50px" name="place">
                </div>
            </div>
        </div>
        <div class="row pt-md-4">
            <div class="col-md-3 txx"style="text-align: center">
                <label>設備數量</label>
            </div>
            <div class="col-md-3">
                <div class="form-group txx" id="device_count">
                    <input type="text" width="50px" name="count">
                </div>
            </div>
        </div>
        <div class="row" style="text-align: center">
            <div class="col-md-4"></div>
            <div class="col-md-4 pt-md-5">
                <button type="submit" class="btn btn-dark txx">新增</button>
            </div>
        </div>
    </form>
</body>
