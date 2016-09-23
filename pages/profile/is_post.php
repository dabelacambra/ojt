<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php include_once "../template/header.php"?>

   <?php include_once "../template/sidebar_menu.php"?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
							 Add Record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
<?php
$id = $_REQUEST['id'];
$name = $_REQUEST['name'];
$category = $_REQUEST['category'];
$desc = $_REQUEST['desc'];
$tracker = $_REQUEST['tracker'];
$access = $_REQUEST['access'];
$front_end = $_REQUEST['front_end'];
$rdbms = $_REQUEST['rdbms'];
$url = $_REQUEST['url'];
$cron = $_REQUEST['cron'];
$Api = $_REQUEST['api'];
$training_url = $_REQUEST['training_url'];
$remarks = $_REQUEST['remarks'];
$assigned_to = $_REQUEST['assigned_to'];
$business_owner = $_REQUEST['business_owner'];
?>
<?php
include "../../config.php";
$sql="INSERT INTO tbl_is (`name`,category,`desc`,`tracker`,`access`,front_end,rdbms,url,cron,api,`training_url`,last_va,remarks,`assigned_to`,`business_owner`)
VALUES ('$name','$category','$desc','$tracker','$access','$front_end','$rdbms','$url','$cron','$Api','$training_url',now(),'$remarks','$assigned_to','$business_owner');";
		

if (!mysqli_query($con,$sql)) { 
die ('error in db: '. mysqli_error($con)); 
}		
echo '<div class="alert alert-success" id="success-alert">
    <span class="centered">
	<a href="is_list.php"><button type="button" class="close" data-dismiss="alert" aria-label="close">
	&times;</button></a>
    <strong>Success! </strong>
	Record has been added
	</span>
	</div>';
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
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/bower_components/raphael/raphael-min.js"></script>
    <script src="/bower_components/morrisjs/morris.min.js"></script>
    <script src="/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>
</html>