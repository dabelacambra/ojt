<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php include_once "../template/header.php" ?>

         <?php include_once "../template/sidebar_menu.php" ?>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
						    Add
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
				
<?php 
$category = $_REQUEST['category'];
$name = $_REQUEST['name'];
$desc = $_REQUEST['desc'];
$tracker = $_REQUEST['tracker'];
$access = $_REQUEST['access'];
$front_end = $_REQUEST['front_end'];
$rdbms = $_REQUEST['rdbms'];
$url = $_REQUEST['url'];
$cron = $_REQUEST['cron'];
$Api = $_REQUEST['api'];
$training_url = $_REQUEST['training_url'];
$last_va = $_REQUEST['last_va'];
$remarks = $_REQUEST['remarks'];
$assigned_to = $_REQUEST['assigned_to'];
$business_owner = $_REQUEST['business_owner'];
?>
<form name="form" action="is_post.php" method="post" onsubmit="return formValidate()">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="hidden" name="category" value="<?php echo $category ?>">
<input type="hidden" name="name" value="<?php echo $name ?>">
<input type="hidden" name="desc" value="<?php echo $desc ?>">
<input type="hidden" name="tracker" value="<?php echo $tracker ?>">
<input type="hidden" name="access" value="<?php echo $access ?>">
<input type="hidden" name="front_end" value="<?php echo $front_end ?>">
<input type="hidden" name="rdbms" value="<?php echo $rdbms ?>">
<input type="hidden" name="url" value="<?php echo $url ?>">
<input type="hidden" name="cron" value="<?php echo $cron ?>">
<input type="hidden" name="api" value="<?php echo $Api ?>">
<input type="hidden" name="training_url" value="<?php echo $training_url ?>">
<input type="hidden" name="last_va" value="<?php echo $last_va ?>">
<input type="hidden" name="remarks" value="<?php echo $remarks ?>">
<input type="hidden" name="assigned_to" value="<?php echo $assigned_to ?>">
<input type="hidden" name="business_owner" value="<?php echo $business_owner ?>">
<table class="table">
    <div class="row">
	<div class="col-lg-12">
	<div class="row">
	<tr>
	<th>Category</th>
	<td><?php echo $category ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Name</th>
	<td><?php echo $name ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Description</th>
	<td><?php echo $desc ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Tracker</th>
	<td><?php echo $tracker ?></td>
	</tr>
	<div class="row">
	<tr>
	<th>Access</th>
	<td><?php echo $access ?></td>
	</tr>
	</div>
	<div class="row">
	<tr>
	<th>Front_end</th>
	<td><?php echo $front_end ?></td>
	</tr>
	</div>
   <div class="row">
	<tr>
	<th>Rdbms</th>
	<td><?php echo $rdbms ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Url</th>
	<td><?php echo $url ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Cron Scripts</th>
	<td><?php echo $cron ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Api Url</th>
	<td><?php echo $Api ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Training_url</th>
	<td><?php echo $training_url ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Last_va</th>
	<td><?php echo $last_va ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Remarks</th>
	<td><?php echo $remarks ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Assigned_to</th>
	<td><?php echo $assigned_to ?></td>
	</tr>
	</div>
		<div class="row">
	<tr>
	<th>Business_owner</th>
	<td><?php echo $business_owner ?></td>
	</tr>
	</div>
</table>
<button type="submit" class="btn btn-primary">Submit</button>
<a href="is_add.php"><button type="button" class="btn btn-">Back</button></a>
</div>
</form>


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