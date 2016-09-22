<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php

/* 
connection to database (definition):
$host - define your host here, if using a remote host, specify the url of the hostname
$db_username - define your database username access here
$db_password - define your database password access here
$db_name - define the database name that will be accessed here
*/
$id=$_REQUEST['id'];

include "../../config.php";
// placeholder and query executor to get the values from the tables person and services, the results are
// then placed in $result which will be needed later below	
$result=mysqli_query($con,"SELECT * FROM tbl_is_log WHERE id = '$id'");

?>
<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
					<small>
						<i class="icon-double-angle-right"></i>
							>> Edit
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<form action="log_update.php" method="post" onsubmit="return formValidate()">
           
                                    
                                       <form action="log_post.php" method="post" onsubmit="return formValidate()"> <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Record
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
									    <?php while ($row=mysqli_fetch_array($result)) { ?>


<div class="form-group">
<input class="form-control" type="hidden" name="id"value="<?php echo $row['id']?>">
</input>
</div>
<div class="form-group">
<label>IS ID</label>
<input class="form-control"type="int" name="is_id"value="<?php echo $row['is_id']?>" disabled>
</input>
</div>
<div class="form-group">
<label>Log Name</label>
<input class="form-control" type="text" name="log_name"value="<?php echo $row['log_name']?>" required>
</input>
</div>
<div class="form-group">
<label>Log Type</label>
<input class="form-control" type="text" name="log_type"value="<?php echo $row['log_type']?>" required>
</input>
</div>
<div class="form-group">
<label>Log Description</label>
<input class="form-control" type="text" name="log_description" value="<?php echo $row['log_description']?>" required>
</input>
</div>
<div class="form-group">
<label>Date Uploaded</label>
<input class="form-control" type="date" name="date_uploaded"value="<?php echo $row['date_uploaded']?>" required>
</input></div>
<div class="form-group">
<label>Uploaded by</label><input class="form-control" type="text" name="uploaded_by"value="<?php echo $row['uploaded_by']?>" required>
</input>
</div>
<div class="form-group">
<label>Fix Description</label>
<input class="form-control" type="text" name="fix_description"value="<?php echo $row['fix_description']?>" required>
</input>
</div>

                 <button type="submit" class="btn btn-info">Submit</button>
                 <button type="reset" class="btn btn-success">Reset</button>
				 <a href="javascript:history.back()"><button type="button" class="btn btn-success">Cancel</a>
<?php } ?>
<?php mysqli_close($con); ?>
                                    </form>
									<script>
function submitform() {
  var e= document.getElementById("isId");
  var strUser = e.options[e.selectedIndex].value;
  
  var strUser = e.option[e.selectedIndex].text; 
  if(strUser==0)
  {
	  alert("Please select")
  }	
  var f = document.getElementsByName('log_name')[0];
  if(f.checkValidity()) {
    f.submit();
  } else {
    alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('log_type')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else{
	  alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('log_description')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('date_uploaded')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  var f= document.getElementsByName('uploaded_by')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('fix_description')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  }
}
</script>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->		
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../bower_components/morrisjs/morris.min.js"></script>
    <script src="../../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Custom DatePicker -->
	<link rel="stylesheet" href="/js/jquery-ui.css">
	<script src="/js/jquery-1.12.4.js"></script>
	<script src="/js/jquery-ui.js"></script>
	<script>
	  $( function() {
		$( "#datepicker" ).datepicker();
	  } );
	</script>
</body>
</html>



