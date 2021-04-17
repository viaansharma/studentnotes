<?php
session_start();
session_destroy();
echo "<script>alert('logout sucessfull');window.location.href='login.php';</script>";
?>