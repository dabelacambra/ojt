<?php include_once "../template/header.php" ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System Documents
						<small>
						<i class="icon-double-angle-right"></i>
							 View record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
<?php

$id=$_REQUEST['id']; 

include "../../config.php";
$result_view=mysqli_query($con,"select * from tbl_is_doc where id = '$id'");
?>
<?php while ($row=mysqli_fetch_array($result_view)) { ?>
<style type="text/css">
</style>	
<div class="panel-body">
<div class="dataTable_wrapper"> 
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>   
<tbody>
	<tr>
	<th>IS ID</th>
	<td><?php echo $row['isid'] ?></td>
	</tr>
	<tr>
	<th>File Format</th>
	<td><?php echo $row['fileformat'] ?></td>
	</tr>
	<tr>
	<th>Uploaded By</th>
	<td><?php echo $row['uploadedby'] ?></td>
	</tr>
	<tr>
	<th>Version</th>
	<td><?php echo $row['version'] ?></td>
	</tr>
	<tr>
	<th>File Name</th>
	<td><?php echo $row['name'] ?></td>
	</tr>
	<tr>
	<th>File Size(bytes)</th>
	<td><?php echo $row['size'] ?></td>
	</tr>
	<tr>
	<th>File Type</th>
	<td><?php echo $row['type'] ?></td>
	</tr>
</tbody>
</table>
<?php } ?>
<?php
mysqli_close($con); 
?>
<a href="doc_edit.php?id=<?php echo $id ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span>Edit</button></a>
<a href="javascript:history.back()"><button type="button" class="btn btn- btn-xs"><span class="glyphicon glyphicon-list"></span>Back</button></a>

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