<?php
session_start();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$con = mysqli_connect("localhost","root","","ismp");

$sql = "SELECT uid,username,password FROM tbl_user WHERE username='$username' AND password='$password'";

$result = mysqli_query($con,$sql);

$login_variables = mysqli_fetch_array($result);

$_SESSION = array(
    'sess_username' => $login_variables['username']
);

if(isset($_SESSION['sees_username'])){
	header ("location: ../index.php");
} else {
	echo "<script type='text/javascript'>alert ('Sorry! Cannot login.'); document.location.href='javascript: history.go(-1)'</script>";
	exit;
}
?>