<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IS Change Logs
						<small>
						<i class="icon-double-angle-right"></i>
							>> Add
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                   <?php
$id=$_REQUEST['id'];				   
$isid=$_REQUEST['is_id']; 
$ln=$_REQUEST['log_name']; 
$lt=$_REQUEST['log_type']; 
$ld=$_REQUEST['log_description']; 
$uby=$_REQUEST['uploaded_by'];
$fd=$_REQUEST['fix_description'];

include "../../config.php";

$sql="INSERT INTO tbl_is_log (id,is_id,log_name,log_type,log_description,date_uploaded,uploaded_by,fix_description)
		VALUES ('$id','$isid','$ln','$lt','$ld',now(),'$uby','$fd');";
		

	if (!mysqli_query($con,$sql)) { 
		die ('error in db: '. mysqli_error($con)); 
		}
	
echo '<div class="alert alert-success" id="success-alert">
    <span class="centered">
	<a href="log_list.php"><button type="button" class="close" data-dismiss="alert" aria-label="close">
	&times;</button></a>
    <strong>Success! </strong>
	Record has been added
	</span>
	</div>';
?>
<?php
mysqli_close($con); 
?>
            <!-- /.row -->
			<div class="row">
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

</body>
</html>