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
$result=mysqli_query($con,"SELECT * FROM tbl_is WHERE id = '$id'");
$result_category=mysqli_query($con,"select * from lib_category");
$result_owner=mysqli_query($con,"select GroupCode, GroupName from lib_agency_group");
$result_assigned=mysqli_query($con,"select group_id, group_name from ost_groups");
$result_access=mysqli_query($con,"select * from lib_access");
$result_tracker=mysqli_query($con,"select * from lib_tracker");
$result_frontend=mysqli_query($con,"select * from lib_frontend");
$result_rdbms=mysqli_query($con,"select * from lib_rdbms");
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
			<?php while ($row=mysqli_fetch_array($result)) { ?>
		            <form name="form" action="is_update.php" method="post">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form">
								<input type="hidden" name="id">
										<div class="form-group">
                                            <label>IS Name</label>
                                            <input class ="form-control" name="name" value="<?php echo $row['name']?>" required>
                                        </div>                                        
                                        <div class="form-group" name = "desc">
                                            <label>IS Description</label>
                                            <textarea class="form-control"  name="desc" rows="3" placeholder="Please insert Description" value="<?php echo $row['desc']?>" required><?php echo $row['desc']?></textarea>
                                        </div>
										 <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control " name="category" required>
											<?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $id;?>" <?php echo ($id == $category ? 'selected' : '');?> selected><?php echo $category;?></option>
											  <?php }
											  ?>									
												<?php 
												while ($row=mysqli_fetch_array($result_category)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>
										 <div class="form-group">
										 <label>Tracker</label>
                                            <select class="form-control"  name="tracker" required>
                                              <?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $row['tracker'];?>" <?php echo ($id == $tracker ? 'selected' : '');?> selected><?php echo $tracker;?></option>
											  <?php }
											  ?>																		
												<?php 
												while ($row=mysqli_fetch_array($result_tracker)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Access</label>
                                            <select class="form-control" name="access" required >
                                                <?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $row['access'];?>" <?php echo ($id == $access ? 'selected' : '');?> selected><?php echo $access;?></option>
											  <?php }
											  ?>																		
												<?php 
												while ($row=mysqli_fetch_array($result_access)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Front End</label>
                                            <select class="form-control" name="front_end" required>
                                                <?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $row['front_end'];?>" <?php echo ($id == $front_end ? 'selected' : '');?> selected><?php echo $front_end;?></option>
											  <?php }
											  ?>																	
												<?php 
												while ($row=mysqli_fetch_array($result_frontend)) { 
												?>
												<option value='<?php echo $row['id'] ?>'><?php echo $row['desc'] ?></option>												
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>RDBMS</label>
                                            <select class="form-control" name = "rdbms" required>
                                                <?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $row['rdbms'];?>" <?php echo ($id == $rdbms ? 'selected' : '');?> selected><?php echo $rdbms;?></option>
											  <?php }
											  ?>																	
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
                                            <input class="form-control" name="url" value="<?php echo $row['url']?>">
											</div>
											<div class="form-group">
                                            <label>CRON Scripts</label>
                                            <input class="form-control" name = "cron" placeholder="http//:" value="<?php echo $row['cron']?>" required >
											</div>
                                            <div class="form-group" name="api">
                                            <label>API URL</label>
                                            <input class="form-control" name="api" placeholder="http//:" value="<?php echo $row['api']?>" required">
											</div> 
											<div class="form-group">
                                            <label>Training URL</label>
                                            <input class="form-control" name = "training_url"placeholder="http//:" value="<?php echo $row['training_url']?>" required">
											</div>
										<div class="form-group">
											<label for="disabledSelect">Last VA</label>
											<input class="form-control" type="date"  name = "last_va" value="<?php echo $row['last_va']?>" required>
										</div>
										<div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name = "remarks" rows="3" placeholder="Please insert Remarks" value="<?php echo $row['remarks']?>"><?php echo $row['remarks']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Assigned To</label>
                                            <select class="form-control" name = "assigned_to" required>
                                                <?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $row['assigned_to'];?>" <?php echo ($id == $assigned_to ? 'selected' : '');?> selected><?php echo $assigned_to;?></option>									
												<?php } ?>
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
                                               <?php
                                              while($row=mysqli_fetch_array($result)) {
		                                     ?>
											 <option value="<?php echo $row['business_owner'];?>" <?php echo ($id == $business_owner ? 'selected' : '');?> selected><?php echo $business_owner;?></option>									
											  <?php } ?>
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row_owner=mysqli_fetch_array($result_owner)) { 
												?>
												<option value='<?php echo $row_owner['GroupCode'] ?>'><?php echo $row_owner['GroupName'] ?></option>												
												<?php } ?>										
                                            </select>
                                        </div>
					                    <?php } ?>										
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


