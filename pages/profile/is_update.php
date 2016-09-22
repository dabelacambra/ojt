<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php include_once "../template/header.php" ?>

  <?php include_once "../template/sidebar_menu.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
							 Edit Record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-9">
                   <?php
$id = $_REQUEST ['id'];
$name = $_REQUEST['name'];
$category = $_REQUEST['category'];
$desc = $_REQUEST['desc'];
$tracker = $_REQUEST['tracker'];
$access = $_REQUEST['access'];
$frontEnd = $_REQUEST['front_end'];
$rdbms = $_REQUEST['rdbms'];
$url = $_REQUEST['url'];
$cron = $_REQUEST['cron'];
$Api = $_REQUEST['api'];
$trainingUrl = $_REQUEST['training_url'];
$lastVa = $_REQUEST['last_va'];
$remarks = $_REQUEST['remarks'];
$assignedTo = $_REQUEST['assigned_to'];
$businessOwner = $_REQUEST['business_owner'];

include "../../config.php";

$sql="UPDATE tbl_is SET name='$name',`category`='$category',`desc`='$desc',tracker='$tracker',`access`='$access',`front_end`='$frontEnd',`rdbms`='$rdbms',`url`='$url',`cron`='$cron',`Api`='$api',training_url='$trainingUrl',last_va='$lastVa',remarks='$remarks',assigned_to='$assignedTo',business_owner='$businessOwner' WHERE id ='$id'";
	
		

	if (!mysqli_query($con,$sql)) { 
		die ('error in db: '. mysqli_error($con)); 
		}
	
echo '<div class="alert alert-success" id="success-alert">
    <span class="centered">
	<a href="is_list.php"><button type="button" class="close" data-dismiss="alert" aria-label="close">
	&times;</button></a>
    <strong>Success! </strong>
	Record has been updated
	</span>
	</div>';
mysqli_close($con); // closes the connection to the database
?>
                </div>
            </div>
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