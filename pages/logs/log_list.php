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

include "../../config.php";
	
// placeholder and query executor to get the values from the tables person and services, the results are
// then placed in $result which will be needed later below	
$result=mysqli_query($con,"select * FROM tbl_is_log");
?>
<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
						Change Log
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Results for "Latest Recorded Information System Change Log" 
							 <a href="log_add.php"><button type="button" class="btn btn-primary btn-xs pull-right">Add New Record</button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Info System ID</th>
                                            <th>Log Name</th>
                                            <th>Log Type</th>
                                            <th>Date Changed</th>
                                            <th>Changed By</th>
                                        </tr>
                                    </thead><!--  -->
                                    <tbody>
										<?php 
								
										// fetches the result from $result and be readied to be displayed in html
										// the format for while syntax is while (parameters) {actions..}
										while ($row=mysqli_fetch_array($result)) { 
										?>
										<tr>
									
											<td>
												<a href="log_delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('are you sure?');"> <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
												<a href="log_view.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>View</button></a>
												<a href="log_edit.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span>Edit</button></a>
											</td>
										
											<td><a href="../profile/is_view.php?id=<?php echo $row['is_id'] ?>"><?php echo $row['is_id'] ?></a></td>
											<td><?php echo $row['log_name'] ?></td>
											<td><?php echo $row['log_type'] ?></td>
											<td><?php echo $row['date_uploaded'] ?></td>
											<td><?php echo $row['uploaded_by'] ?></td>
										</tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
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

    <!-- DataTables JavaScript -->
    <script src="../../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>

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