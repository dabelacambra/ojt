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
$result_category=mysqli_query($con,"SELECT * from lib_category");
$result_owner=mysqli_query($con,"SELECT GroupCode, GroupName from lib_agency_group");
$result_assigned_to=mysqli_query($con,"SELECT group_id, group_name from ost_groups");
$result_access=mysqli_query($con,"SELECT * from lib_access");
$result_tracker=mysqli_query($con,"SELECT * from lib_tracker");
$result_front_end=mysqli_query($con,"SELECT * from lib_frontend");
$result_rdbms=mysqli_query($con,"SELECT * from lib_rdbms");
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
			<?php $row=mysqli_fetch_array($result) // while ($row=mysqli_fetch_array($result)) { ?>
		            <form name="form" action="is_update.php" method="post">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form">
								<input type="hidden" name="id">
										<div class="form-group">
                                            <label>IS Name</label>
                                            <input class ="form-control" name="name" value="<?php echo $row['name']?>" >
                                        </div>                                        
                                        <div class="form-group" name = "desc">
                                            <label>IS Description</label>
                                            <textarea class="form-control"  name="desc" rows="3" placeholder="Please insert Description" value="<?php echo $row['desc']?>" required><?php echo $row['desc']?></textarea>
                                        </div>
										 <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control " name="category" >
											<option value="" disabled selected>Select your option</option>
												<?php while ($row_category=mysqli_fetch_array($result_category)) { ?>
                                                    <option value="<?php echo $row_category['id'];?>" <?php echo ($row_category['id'] == $row['category'] ? 'selected' : '');?> ><?php echo $row_category['desc'];?></option>
												<?php } ?>										
                                            </select>
                                        </div>
										 <div class="form-group">
										 <label>Tracker</label>
                                            <select class="form-control"  name="tracker" >
                                              <option value="" disabled selected>Select your option </option>
											  <?php while($row_tracker=mysqli_fetch_array($result_tracker)) { ?>
											    <option value="<?php echo $row_tracker['id'];?>" <?php echo ($row_tracker['id'] == $row['tracker'] ? 'selected' : '');?> ><?php echo $row_tracker['desc'];?></option>
											  <?php } ?>
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Access</label>
                                            <select class="form-control" name="access" >
											<option value="" disabled selected>Select your option </option>
												<?php while ($row_access=mysqli_fetch_array($result_access)) { ?>
												    <option value="<?php echo $row_access['id']; ?>" <?php echo ($row_access['id'] == $row['access'] ? 'selected' : '');?> > <?php echo $row_access['desc'];?></option>
												<?php } ?>	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>Front End</label>
                                            <select class="form-control" name="front_end" >
											<option value="" disabled selected>Select your option </option>
                                        <?php while($row_front_end=mysqli_fetch_array($result_front_end)) {  ?>
											 <option value="<?php echo $row_front_end['id']; ?>" <?php echo ($row_front_end['id'] ==  $row['front_end']? 'selected' : '');?> > <?php echo $row_front_end['desc'];?></option>
											  <?php }  ?>																	
                                                 </select>	
    											</div> 
										 <div class="form-group">
										 <label>RDBMS</label>
                                            <select class="form-control" name = "rdbms" >
											<option value="" disabled selected>Select your option </option>
                                             <?php while($row_rdbms=mysqli_fetch_array($result_rdbms)) { ?>
											 <option value="<?php echo $row_rdbms['id']; ?>" <?php echo ($row_rdbms['id'] == $row['rdbms'] ? 'selected' : '');?> > <?php echo $row_rdbms['desc'];?></option>
											  <?php } ?>													
                                                 </select>	
    											</div> 
                                            <div class="form-group">
                                            <label>URL</label>
                                            <input class="form-control" name="url" value="<?php echo $row['url']?>">
											</div>
											<div class="form-group">
                                            <label>CRON Scripts</label>
                                            <input class="form-control" name = "cron" placeholder="http//:" value="<?php echo $row['cron']?>" >
											</div>
                                            <div class="form-group" name="api">
                                            <label>API URL</label>
                                            <input class="form-control" name="api" placeholder="http//:" value="<?php echo $row['api']?>">
											</div> 
											<div class="form-group">
                                            <label>Training URL</label>
                                            <input class="form-control" name = "training_url"placeholder="http//:" value="<?php echo $row['training_url']?>">
											</div>
										<div class="form-group">
											</div>
										<div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name = "remarks" rows="3" placeholder="Please insert Remarks" value="<?php echo $row['remarks']?>"><?php echo $row['remarks']?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Assigned To</label>
                                            <select class="form-control" name = "assigned_to" >
											<option value="" disabled selected>Select your option </option>
                                             <?php while($row_assigned_to=mysqli_fetch_array($result_assigned_to)) { ?>
											 <option value="<?php echo $row_assigned_to['group_id']; ?>" <?php echo ($row_assigned_to['group_id'] == $row['assigned_to'] ? 'selected' : '');?> > <?php echo $row_assigned_to['group_name'];?></option>
											  <?php } ?>													
                                                 </select>	
    											</div> 
                                        <div class="form-group">
                                            <label>Business Owner</label>
                                            <select class="form-control" name = "business_owner">
											<option value="" disabled selected>Select your option </option>
                                             <?php while($row_business_owner=mysqli_fetch_array($result_owner)) { ?>
											 <option value="<?php echo $row_business_owner['GroupCode']; ?>" <?php echo ($row_business_owner['GroupCode'] == $row['business_owner'] ? 'selected' : '');?> ><?php echo $row_business_owner ['GroupName'];?></option>									
											  <?php } ?>									
                                            </select>
                                        </div>
					                    <?php // } ?>
                                        <button type="submit" class="btn btn-  ">Submit</button>
                                        <button type="reset" class="btn btn-success ">Reset</button>
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


