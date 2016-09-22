<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php 
 $target = "documents/"; 
 $target = $target . basename( $_FILES['uploaded']['name']) ; 
 $ok=1; 
 if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
 {
 echo "<script type='text/javascript'>alert('This file ". basename( $_FILES['uploaded']['name']) ." has been uploaded.'); </script>";
		exit;

 } 
 else {
	    echo "<script type='text/javascript'>alert('Sorry, there was a problem uploading your file.'); document.location.href = 'javascript: history.go(-1)' </script>";
		exit;
 }
 ?> 
<?php
	//$time = time();	
	$limit_size=25600000; /*limit file up to 25MB*/
	if( $_FILES['uploaded']['size'] >= $limit_size ){
	    echo "<script type='text/javascript'>alert('This file exceeds the 25MB attachment limit. Please edit file and upload again.'); document.location.href = 'javascript: history.go(-1)' </script>";
		exit;
	}
?>