<?php
session_start();

session_destroy();
echo "<script type='text/javascript'>alert ('Goodbye ". $_SESSION['sees_username'] ."!'); document.location.href='login.php' </script>";
?>