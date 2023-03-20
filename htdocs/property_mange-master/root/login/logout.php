<?php
session_start();
session_destroy();
echo  "<script>location.href='../../user/index.php';</script>";
?>