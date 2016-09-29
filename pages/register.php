<?php
include "../config.php";

$result_region=mysqli_query($con,"select * from lib_regions");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Information Systems Management Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">
<div class="login-panel panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><strong>Registration</h3>
</div>
<div class="panel-body">
<form role="form" action="registerconfirm.php" method="get">
<fieldset>
<input type="hidden" name="uid">
<div class="form-group">
<label>Username</label>
<input class="form-control" placeholder="Pick a username" name="username" type="text" autofocus required>
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" placeholder="Create a password" name="password" type="password" required>
</div>
<div class="form-group">
<label>Email</label>
<input class="form-control" placeholder="Your email address" name="email" type="text" required>
</div>
<div class="form-group">
<label>Full Name</label>
<input class="form-control" placeholder="Your full name" name="user_fullname" type="text" autofocus required>
</div>
<div class="form-group">
<label>Region</label>
<select class="form-control" name="region" required>
<option value="" disabled selected>Select your option  </option>									
<?php 
while ($row=mysqli_fetch_array($result_region)) { 
?>
<option value='<?php echo $row['region_code'] ?>'><?php echo $row['region_name'] ?></option>												
<?php } ?>	
</select>	
</div>
<div class="form-group">
<label>Office</label>
<input class="form-control" placeholder="Your office" name="office" type="text">
</div>
<button type="submit" class="btn btn-primary btn-block">Submit</button>
<a href="javascript:history.back()" role="button" class="btn btn btn-warning btn-block">Cancel</button></a>
</fieldset>
</div>
</div>
</div>
</div>
</div>

<!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
