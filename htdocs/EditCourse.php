<?php
require "ConnectDB.php";

    $new_course_id = $_POST['course_id'];
    $new_title = $_POST['title'];
    $new_dept_name = $_POST['dept_name'];
    $new_credits = $_POST['credits'];

    $sql = "UPDATE course SET
            title='$new_title',
            dept_name = '$new_dept_name',
            credits= '$new_credits'
            WHERE course_id = '$new_course_id'";

    mysqli_query($conn,$sql);

    header("Location: index.php");
?>