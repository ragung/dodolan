<?php
session_start();
session_destroy();
echo "<script>alert('Logout Success');</script>";
echo "<script>location='index.php';</script>";
?>