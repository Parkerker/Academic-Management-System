<!DOCTYPE html>
<html>
<body>
<?php
    require "ConnectDB.php";

    $id=($_GET['id']);
    $sql = "SELECT * FROM course WHERE course_id = '$id'";
    $result = $conn ->query($sql);
    $row = $result -> fetch_assoc();

    $course_id = $row['course_id'];
    $title = $row['title'];
    $dept_name = $row['dept_name'];
    $credits = $row['credits'];
?>
<form action="EditCourse.php" method="post">
    <label>學號：40743259</label>    
    </br>
    <label>課程編號：</label>
    </br>
    <input type="text" id="course_id" name="course_id" value="<?php echo $course_id;?>" readonly>  
    </br>
    <label>科目：</label>
    </br>
    <input type="text" id="title" name="title" value="<?php echo $title;?>">
    </br>
    <label>科系：</label>
    </br>
    <input type="text" id="dept_name" name="dept_name" value="<?php echo $dept_name;?>" readonly>
    </br>
    <label>學分：</label>
    </br>
    <input type="text" id="credits" name="credits" value="<?php echo $credits;?>">
    </br>
    </br>
    <input type="submit" value="修改資料" />

</form>
</body>
</html>