<?php
include '../../api/connect.php';
$_SESSION['admin_id'] = null;
session_destroy();
header("Location: ../index.php");
?>