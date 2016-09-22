<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php


include "../../config.php";

$result_id=mysqli_query($con,"select * from tbl_is");	
?>
<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IS Documents
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
				
			
<form name="form" action="doc_collect.php" method="post">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">Select IS ID</div>
        <div class="panel body">
		<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-12">
		<form role="form">
		<input class="hidden" name="id" value="<?php echo $uniqid ?>">
		<div class="form-group">
		<label>Info System ID</label>
		<select name="isid" class="form-control" required>
		<option value=""disabled selected>Please Select</option>
		<?php 
		while ($row=mysqli_fetch_array($result_id)) {
		?>
		<td name="is_id"><option value='<?php echo $row['id'] ?>-<?php echo $row['name'] ?>'><?php echo $row['id'] ?>-<?php echo $row['name'] ?></option></td>
		<?php } ?>
		</select>
		</div>		
		<button type="submit" class="btn btn-primary">Upload File</button>
		<button type="reset" class="btn btn-default">Reset</button>
		<text>Or      </text>
		<a href="doc_list.php"><button type="button" class="btn btn-warning">Cancel</button></a><br>                 			
		</form>
		</div>
        </div>
		</div>
</div>
</div>
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