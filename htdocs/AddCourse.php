<?php
    require "ConnectDB.php";
    $course_id = $_POST['course_id'];
    $title = $_POST['title'];
    $dept_name = $_POST['dept_name'];
    $credits = $_POST['credits'];

    $sql = "INSERT INTO course(course_id,title,dept_name,credits)
            VALUES ('$course_id','$title','$dept_name','$credits')";

    mysqli_query($conn,$sql);

    header("Location: index.php");

?>