<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php include_once "../template/header.php" ?>
<?php
include "../../config.php";
$result=mysqli_query($con,"select * from lib_version");
$result_format=mysqli_query($con,"select * from lib_format");
$result_uploader=mysqli_query($con,"select * from lib_uploader");
?>
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
				
<?php 
$isId=$_REQUEST['isid'];
?>
<form name="form" action="doc_post.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="hidden" name="isid" value="<?php echo $isId ?>">
<table class="table">
    <div class="row">
	<div class="col-lg-12">
	<tr>
	<th>IS ID</th>
	<td><?php echo $isId ?></td>
	</tr>
	</div>
</table>
	<div class="form-group">
	<label>File Type</label>
	<select name="fileformat" class="form-control" required>
    <option value=""disabled selected>Please Select</option>
    <?php
    while ($row=mysqli_fetch_array($result_format)) {
	?>
	<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>
	<?php } ?>
	</select>
	</div>
	<div class="form-group">
	<label>Uploaded By</label>
	<select name="uploadedby" class="form-control" required>
	<option value=""disabled selected>Please Select</option>
	<?php
	while ($row=mysqli_fetch_array($result_uploader)) {
	?>
	<option value='<?php echo $row ['desc'] ?>'><?php echo $row ['desc'] ?></option>
	<?php } ?>
	</select>
	</div>
	<div class="form-group">
    <label>Versions</label>
    <select name="version" class="form-control" required>
    <option value=""disabled selected>Please Select</option>						
	<?php
	while ($row=mysqli_fetch_array($result)) { 
	?>
	<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>												
	<?php } ?>										
    </select>
    </div>
    <div class="form-group">
	<label for="uploaded_file">Upload File</label><br>
	<span class="btn btn-default btn-file">
	<input type="file" name="uploaded" method="post" size="50" required>
	</span>
	</div>	
<button type="submit" class="btn btn-primary">Submit</button>
<a href="javascript:history.back()"><button type="button" class="btn btn-">Back</button></a>
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