<?php
session_start();

echo "<script type='text/javascript'>alert ('Logout Successfully!');</script>";
session_destroy();
header("location: login.php");
?>