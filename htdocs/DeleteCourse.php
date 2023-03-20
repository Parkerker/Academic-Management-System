<?php
    require "ConnectDB.php";

    $course_id = ($_GET['id']);

    $sql = "DELETE FROM course WHERE course_id ='$course_id'";

    $result = $conn ->query($sql);

    header("Location: index.php");

?>