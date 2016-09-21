<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IS Change Logs
						<small>
						<i class="icon-double-angle-right"></i>
							>> Edit
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                   <?php
$id=$_REQUEST['id'];				   
$ln=$_REQUEST['log_name']; 
$lt=$_REQUEST['log_type']; 
$ld=$_REQUEST['log_description']; 
$du=$_REQUEST['date_uploaded'];
$uby=$_REQUEST['uploaded_by'];
$fd=$_REQUEST['fix_description'];

include "../../config.php";
// MYSQL INSERT SYNTAX defined below. The values were taken from the previous pages add.php and collect.php
// which was recieved here using php $_REQUEST function	
$sql="UPDATE tbl_is_log SET log_name='$ln',log_type='$lt',log_description='$ld',date_uploaded='$du',uploaded_by='$uby',fix_description='$fd' WHERE id ='$id'";
		
		

	if (!mysqli_query($con,$sql)) { // executes the query and checks if it was properly executed
		die ('error in db: '. mysqli_error($con)); // show error
		}
	
	echo '<div class="alert alert-success" id="success-alert">
    <span class="centered">
	<a href="doc_list.php"><button type="button" class="close" data-dismiss="alert" aria-label="close">
	&times;</button></a>
    <strong>Success! </strong>
	Record has been updated<br>
    <a href="log_list.php"><button type="button" class="btn btn-"><span class="glyphicon glyphicon-ok">OK</span></button></a>
	</span>
	</div>';
mysqli_close($con); // closes the connection to the database
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