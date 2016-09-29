<?php
session_start();

include "../config.php"; 

$username = $_REQUEST['username']; 
$password = $_REQUEST['password']; 

$sql = "SELECT uid,username,password FROM tbl_user WHERE username='$username' AND password='$password'"; //remove password checker if the password is hashed, create new if statement for it.

$result = mysqli_query($con,$sql);

$login_variables = mysqli_fetch_array($result);

$_SESSION['sees_username']=$login_variables['username'];
$_SESSION['sees_password']=$login_variables['password'];

if(isset($_SESSION['sees_username']) && isset($_SESSION['sees_password'])){
	echo "<script type='text/javascript'>alert ('You are now logged in as ". $_SESSION['sees_username'] ."'); document.location.href='../index.php' </script>";
} else {
	echo "<script type='text/javascript'>alert ('Sorry! Cannot login.'); document.location.href='javascript: history.go(-1)'</script>";
	exit;
}
?>