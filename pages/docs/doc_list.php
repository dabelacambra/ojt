
<?php
include "../../config.php";
$result=mysqli_query($con,"select * from tbl_is_doc");
?>
 <?php include_once "../template/header.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
							 Documents
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Results for "Latest Recorded Information System Documents" 
							<a href="doc_add.php"><button href="" type="button" class="btn btn-primary btn-xs pull-right">Add New Record</button></a>
                        </div>
                        <!-- /.panel-heading -->
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th class="col-xs">Action</th>
	<th class="col-xs">Info System ID</th>
	<th class="col-xs">File Name</th>
	<th class="col-xs">File Format</th>
	<th class="col-xs">Uploaded by</th>
	<th class="col-xs">Version</th>
</tr>	
</thead>
<tbody>
<?php
while ($row=mysqli_fetch_array($result)) {
?>  
<tr>
	<td>
	<a href="doc_delete.php?id=<?php echo $row['id'] ?>" onclick="return confirm('are you sure?');"> <button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
    <a href="doc_view.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-zoom-in">View</span></button>
	<a href="doc_edit.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit">Edit</span></button>
	<a href="doc_download.php?download_file=<?php echo $row ['name'] ?>" target="_self"><button type="button" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-download">Download File</span></button></a>
	</td>
	<td><a href="../profile/is_view.php?id=<?php echo $row['isid'] ?> "><?php echo $row['isid'] ?></a></td>
	<td><?php echo $row['name'] ?></td>
	<td><?php echo $row['fileformat'] ?></td>
	<td><?php echo $row['uploadedby'] ?></td>
	<td><?php echo $row['version'] ?></td>
</tr>
<?php } ?>
</tbody>
<?php 
mysqli_close($con);
?>
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
    <script src="../../dist/js/sb-admin-2.js"></script>

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