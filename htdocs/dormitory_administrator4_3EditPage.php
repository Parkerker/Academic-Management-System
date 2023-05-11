<link href="styles/AddPage5_1style.css" rel="stylesheet" type="text/css">
<!DOCTYPE html>
<html>
<body>
<?php
    require "ConnectDB.php";

    $id=($_GET['id']);
    $sql = "SELECT * FROM punch WHERE Sign_in = '$id'";
    $result = $conn ->query($sql);
    $row = $result -> fetch_assoc();

    $S_ID = $row['S_ID'];
    $Sign_in = $row['Sign_in'];
    

?>
<form action="dormitory_administrator4_3Edit.php" method="post">
    <label></label>    
    </br>
    <label>學生ID：</label>
    </br>
    <input type="text" id="S_ID" name="S_ID" value="<?php echo $S_ID;?>">
    </br>
    <label>日期：</label>
    </br>
    <input type="text" id="Sign_in" name="Sign_in" value="<?php echo $Sign_in;?>">
    </br>
    
    </br>
    <input type="submit" value="修改資料" />

</form>
</body>
</html>