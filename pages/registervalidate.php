<?php
include "../config.php";
?>
<?php
$uid = $_REQUEST['uid'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$fullname = $_REQUEST['user_fullname'];
$region = $_REQUEST['region'];
$office = $_REQUEST['office'];


$sql_verfiy_email = "SELECT * from tbl_user where email='$email'";
$result_verify_email = mysqli_query($con,$sql_verfiy_email);
if(!$result_verify_email){
	echo 'Query Error';
}

$sql_verify_username = "SELECT * from tbl_user where username='$username'";
$result_verify_username = mysqli_query($con,$sql_verify_username);
if(!$result_verify_username){
	echo 'Query Error';
}
if (mysqli_num_rows($result_verify_username) == 0){
	
if (mysqli_num_rows($result_verify_email) == 0){

$activation = md5(uniqid(rand(), true));

$sql="INSERT INTO tbl_user(`username`,`password`,`email`,`user_fullname`,`region`,`office`,`date_inserted`)
VALUES ('$username','$password','$email','$fullname','$region','$office',now());";
$result = mysqli_query($con,$sql);
if (!mysqli_query($con,$sql)) { 
		die ('error in db: '. mysqli_error($con)); 
		}
if (mysqli_affected_rows($con) == 1){
	
	echo "<script type='text/javascript'>alert ('Success! Thanks for registering! A confirmation email has been sent to ' . $email .' Please click on the Activation to link to activate your account.'); window.location.href='login.php'</script>";
} else {
	echo "<script type='text/javascript'>alert ('Sorry! An error was encountered.'); window.location.href='login.php'</script>";
}
} else {
	echo "<script type='text/javascript'>alert ('Sorry! Email Already Exists'); window.location.href='login.php'</script>";
}
} else {
	echo "<script type='text/javascript'>alert ('Sorry! Username Already Exists'); window.location.href='login.php'</script>";
}

mysqli_close($con);
?>