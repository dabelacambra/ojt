<?php 
$id=$_REQUEST['id'];


include "../../config.php";
	$result=mysqli_query($con,"SELECT
t1.`name`,
t2.`desc`,
t1.`desc`,
t1.category,
t1.tracker,
t1.access,
t1.front_end,
t1.rdbms,
t1.url,
t1.cron,
t1.api,
t1.training_url,
t1.last_va,
t1.remarks,
t1.assigned_to,
t2.`desc` AS categoryname,
t3.`desc` AS trackername,
t4.`desc` AS accessname,
t1.front_end,
t5.`desc` AS frontendname,
t6.`desc` AS rdbmsname,
t7.group_id,
t7.group_name,
t1.business_owner,
lib_agency_group.GroupName,
lib_agency_group.GroupCode,
t3.id
FROM
tbl_is AS t1
LEFT JOIN lib_category AS t2 ON t1.category = t2.id
LEFT JOIN lib_tracker AS t3 ON t1.tracker = t3.id
LEFT JOIN lib_access AS t4 ON t1.access = t4.id
LEFT JOIN lib_frontend AS t5 ON t1.front_end = t5.id
LEFT JOIN lib_rdbms AS t6 ON t1.rdbms = t6.id
LEFT JOIN ost_groups AS t7 ON t1.assigned_to = t7.group_id
LEFT JOIN lib_agency_group ON t1.business_owner = lib_agency_group.GroupCode
WHERE
t1.id = '$id'");
?>

<?php include_once "../template/header.php"?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
					<small>
						<i class="icon-double-angle-right"></i>
						     Edit record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Record
                        </div>
					<form name="form" action="is_update.php" method="post"  onsubmit="submitform()">
					<input type="hidden" name="id">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form">
								<input type="hidden" name="id">
										<div class="form-group">
                                            <label>IS Name</label>
                                            <input class ="form-control" name = "name" >
                                        </div>                                        
                                        <div class="form-group" name = "desc">
                                            <label>IS Description</label>
                                            <textarea class="form-control"  name = "desc"rows="3"></textarea>
                                        </div>
										 <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control " name = "category" >
                                                <option value="" disabled selected>Select your option </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_category)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>
										 <div class="form-group">
										 <label>Tracker</label>
                                            <select class="form-control "  name = "tracker" >
                                                <option value="" disabled selected>Select your option  </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_tracker)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Access</label>
                                            <select class="form-control" name = "access"  >
                                                <option value="" disabled selected>Select your option </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_access)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?>'</option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Front End</label>
                                            <select class="form-control" name = "front_end" >
                                                <option  value="" disabled selected>Select your option  </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_frontend)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>RDBMS</label>
                                            <select class="form-control" name = "rdbms" >
                                                <option value="" disabled selected>Select your option </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result_rdbms)) { 
												?>
												<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
                                            <div class="form-group">
                                            <label>URL</label>
                                            <input class= "form-control" name = "url">
											</div>
											<div class="form-group">
                                            <label>CRON Scripts</label>
                                            <input class="form-control" name = "cron" >
											</div>
                                            <div class="form-group" name = "api">
                                            <label>API URL</label>
                                            <input class="form-control" name = "api">
											</div> 
											<div class="form-group">
                                            <label>Training URL</label>
                                            <input class="form-control" name = "training_url">
											</div>
										<div class="form-group">
											<label for="disabledSelect">Last VA</label>
											<input class="form-control" type="date"  name = "last_va">
										</div>
										<div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name = "remarks" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Assigned To</label>
                                            <select class="form-control" name = "assigned_to" >
                                                <option value="" disabled selected>Select your option </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row_assigned=mysqli_fetch_array($result_assigned)) { 
												?>
												<option value='<?php echo $row_assigned['group_name'] ?>'><?php echo $row_assigned['group_name'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Business Owner</label>
                                            <select class="form-control" name = "business_owner">
                                                <option value="" disabled selected>Select your option </option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row_owner=mysqli_fetch_array($result_owner)) { 
												?>
												<option value='<?php echo $row_owner['GroupCode'] ?>'><?php echo $row_owner['GroupName'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>											
                                         <a href="is_list.php?id=<?php echo $row['id']?>"><button type="submit" class="btn btn-  ">Submit</button>
                                        <a href="is_edit.php?id=<?php echo $row['id']?>"><button type="reset" class="btn btn-success ">Reset</button>
                                    </form>
									
                                </div>
                                <!-- /.col-lg-6 (nested) --><script>

</script>
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

    <!-- Morris Charts JavaScript -->
    <script src="../../bower_components/raphael/raphael-min.js"></script>
    <script src="../../bower_components/morrisjs/morris.min.js"></script>
    <script src="../../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

    <!-- Custom DatePicker -->
	<link rel="stylesheet" href="/js/jquery-ui.css">
	<script src="../../js/jquery-1.12.4.js"></script>
	<script src="../../js/jquery-ui.js"></script>
	<script>
	  $( function() {
		$( "#datepicker" ).datepicker();
	  } );
	</script>
	
</body>
</html>


