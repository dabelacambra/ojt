<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IS Change Logs
						<small>
						<i class="icon-double-angle-right"></i>
							>> Delete
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <?php

$id=$_GET['id'];


/* 
connection to database (definition):
$host - define your host here, if using a remote host, specify the url of the hostname
$db_username - define your database username access here
$db_password - define your database password access here
$db_name - define the database name that will be accessed here
*/

include "../../config.php";
// deletes the data from the database where id is equal to the value defined from $id	
mysqli_query($con,"DELETE FROM tbl_is_log WHERE id = '$id'");



	echo '<div class="alert alert-danger" id="success-alert">
    <span class="centered">
    <a href="doc_list.php"><button type="button" class="close" data-dismiss="alert" aria-label="close">
	&times;</button></a>
    <strong>Deleted! </strong>
	Record has been updated<br>
    <a href="log_list.php"><button type="button" class="btn btn-"><span class="glyphicon glyphicon-ok"></span>OK</button></a>
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