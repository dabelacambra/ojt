<?php
session_start();

if(!isset($_SESSION['sees_username'])){
	header("location: ../login.php");
} else {
	echo "<script type='text/javascript'>alert('You are logged in as ". $_SESSION['sees_username'] ."'); </script>";
}
?>
<?php

include "../../config.php";

$result_id=mysqli_query($con,"select * from tbl_is");	
$result_version=mysqli_query($con,"select * from lib_version");
$result_format=mysqli_query($con,"select * from lib_format");
$result_uploader=mysqli_query($con,"select * from lib_uploader");
?>
<?php include_once "../template/header.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IS Documents
						<small>
						<i class="icon-double-angle-right"></i>
							>> Edit
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
<?php 
$id=$_REQUEST['id'];
?>
<?php


$result=mysqli_query($con,"select * from tbl_is_doc where id = '$id'");
if($result == FALSE){
	die("Error");
}
?>
<form name="form" action="doc_update.php" method="post" enctype="multipart/form-data" onsubmit="submitform()">
<input type="hidden" name="id" <?php echo $id?>>
<div class="row">
<div class="col-md-12 col-sm-6 col-xs-12">
<div class="panel panel-default">
<div class="panel-heading clearfix">
<i class="icon-calendar"></i>
<h3 class="panel-title">Edit Record</h3>
</div>
<?php while ($row=mysqli_fetch_array($result)) { ?>

		<div class="panel body">
		<form class="form-horizontal row-border">
		<input class="form-control" type="hidden" name="id"value="<?php echo $row['id']?>">
        </input>
		<div class="form-group">
		<label class="col-md-6 control-label">IS ID</label>
		<input type="text" name="is_id" class="form-control" value="<?php echo $row['isid'] ?>" disabled>
		</div>
		<div class="form-group">
		<label class="col-md-6 control-label">File Format</label>
		<select name="fileformat" class="form-control" required>
		<?php
        while($row=mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $id;?>" <?php echo ($id == $fileFormat ? 'selected' : '');?> selected><?php echo $fileFormat;?></option>
		<?php } ?>
		<?php
        while ($row=mysqli_fetch_array($result_format)) {
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row['desc'] ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="form-group">
		<label class="col-md-6 control-label">Uploaded By</label>
		<select name="uploadedby" class="form-control" required>
		<?php
        while($row=mysqli_fetch_array($result)) {
		?>
		<option value=" <?php echo $id;?>" <?php echo ($id == $uploadedBy ? 'selected' : '');?> selected><?php echo $uploadedBy;?></option>
		<?php } ?>
		<?php
		while ($row=mysqli_fetch_array($result_uploader)) {
		?>
		<option value='<?php echo $row['desc'] ?>'><?php echo $row ['desc'] ?></option>
		<?php } ?>
		</select>
		</div>
		<div class="form-group">
        <label class="col-md-6 control-label">Version</label>
        <select name="version" class="form-control" required>
        <?php
        while($row=mysqli_fetch_array($result)) {
		?>
		<option value="<?php echo $id;?>" <?php echo ($id == $version ? 'selected' : '');?> selected><?php echo $version;?></option>						
		<?php } ?>
		<?php
		while ($row=mysqli_fetch_array($result_version)) { 
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
        <div class="form-group">
		<button type="submit" class="btn btn-primary">Submit</button>
		<button type="reset" class="btn btn-default">Reset</button>
		<text>Or      </text>
		<a href="javascript:history.back()"><button type="button" class="btn btn-warning">Cancel</button></a><br>                 			
		</form>
		</div>
</div>
</div>
</div>
</div>
</form>
<?php } ?>
<?php mysqli_close($con);
?>

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