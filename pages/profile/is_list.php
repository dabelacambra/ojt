<?php
session_start();

if(!isset($_SESSION['sees_username']['sees_password'])){
	header("location: ../login.php");
} else {
	echo "<script type='text/javascript'>alert('You are logged in as ". $_SESSION['sees_username'] ."'); </script>";
}
?>
<?php



include "../../config.php";

	
$result=mysqli_query($con,"select t1.id ,t1.`name`, t1.category, t1.url, t1.assigned_to, t1.access, t2.`desc` as categoryname, t3.`desc` as accessname, t4.group_id, t4.group_name  
							from tbl_is as t1 
							LEFT JOIN lib_category as t2 on t1.category = t2.id 
							LEFT JOIN lib_access as t3 on t1.access = t3.id
							LEFT JOIN ost_groups as t4 on t1.assigned_to = t4.group_id");
?>
<?php include_once "../template/header.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
							 List
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Results for "Latest Recorded Information System" 
							<a href="../../pages/profile/is_add.php"><button href="" type="button" class="btn btn-primary btn-xs pull-right">Add New Record</button></a>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Info System Name</th>
                                            <th>Category</th>
                                            <th>URL</th>
                                            <th>Assigned Team/Person</th>
                                            <th>Access</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php 
										// fetches the result from $result and be readied to be displayed in html
										// the format for while syntax is while (parameters) {actions..}
										while ($row=mysqli_fetch_array($result)) { 
										?>
										<tr>
											<td>
											    <a href="is_delete.php?id=<?php echo $row['id']  ?>" onclick="return confirm('are you sure?');"><button type=button class = "btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove"></span></button></a>
											    <a href="is_view.php?id=<?php echo $row['id']  ?>"><button type=button class = "btn btn-info btn-xs"><span class="glyphicon glyphicon-zoom-in"></span>View</button></a>
												<a href="is_edit.php?id=<?php echo $row['id'] ?>"><button type=button class = "btn btn-success btn-xs"><span class="glyphicon glyphicon-edit"></span>Edit</button></a>
												</td>
												 	
											</td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['category'] ?><?php echo $row['categoryname']?></td>
											<td><?php echo $row['url'] ?></td>
											<td><?php echo $row['assigned_to'] ?><?php echo $row['group_name']?></td>
											<td><?php echo $row['access'] ?><?php echo $row ['accessname']?></td>
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