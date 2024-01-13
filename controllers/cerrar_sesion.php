<?php
session_start();

session_destroy();

header("Location: ../views/vst_login.php");
exit();
?>
