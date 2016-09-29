<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php


$id=$_REQUEST['id'];

include "../../config.php";

$result=mysqli_query($con,"SELECT * FROM tbl_is_log WHERE id = '$id'");
$result_doc=mysqli_query($con,"select * from tbl_is_log");

?>
<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
					<small>
						<i class="icon-double-angle-right"></i>
							>> View Record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
 <?php while ($row=mysqli_fetch_array($result)) { ?>
<style type="text/css">
</style>	
<div class="panel-body">
 <div class="dataTable_wrapper"> 
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>   
<tbody>
	<tr>
	<th>IS ID</th>
	<td><?php echo $row['is_id'] ?></td>
	</tr>
	<tr>
	<th>Log Name</th>
	<td><?php echo $row['log_name'] ?></td>
	</tr>
	<tr>
	<th>Log Type</th>
	<td><?php echo $row['log_type'] ?></td>
	</tr>
	<tr>
	<th>Log Description</th>
	<td><?php echo $row['log_description'] ?></td>
	</tr>
	<tr>
	<th>Date Uploaded</th>
	<td><?php echo $row['date_uploaded'] ?></td>
	</tr>
	<tr>
	<th>Uploaded by</th>
	<td><?php echo $row['uploaded_by'] ?></td>
	</tr>
	<tr>
	<th>Fix Description</th>
	<td><?php echo $row['fix_description'] ?></td>
	</tr>
</tbody>
</table>
<?php } ?>
<?php
mysqli_close($con); 
?>
<a href="log_edit.php?id=<?php echo $id ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span>Edit</button></a>
<a href="javascript:history.back()"><button type="button" class="btn btn- btn-xs"><span class="glyphicon glyphicon-list"></span>Back</button></a>

                                    </form>
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



