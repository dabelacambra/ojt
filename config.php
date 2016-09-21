<?php
$host="localhost";
$db_username="root";
$db_password="";
$db_name="ismp";

$con=mysqli_connect("$host","$db_username","$db_password","$db_name");

	if (mysqli_connect_errno()) {
		echo "error in db: " . mysqli_connect_error();
	}
?>