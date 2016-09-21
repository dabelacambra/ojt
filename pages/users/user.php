<?php include_once "../template/header.php" ?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">IS Documents
						<small>
						<i class="icon-double-angle-right"></i>
							>> Profile
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-9">
                    <span class="pull-left"></span>
<?php
include "../../config.php";
$result=mysqli_query($con,"select * from tbl_user limit 1");
?>
<?php
while($row=mysqli_fetch_array($result)){
?>
<div class="profile">
<div class="row clearfix">
<div>
<center>
<img src="#" class="image-responsive profile-avatar">
<br>
<div class="button-group">
<button href="#">Edit Profile</button>
<button href="#">Logout</button>
</div>
</center>
</div>
</div>
</div>
<center>
<h3 class="text-center profile-text profile-title"><?php echo $row['username'] ?></h3>
<h4 class="text-center profile-text profile-name"><?php echo $row['user_fullname'] ?></h4>
<h4 class="text-center profile-text profile-details">DSWD Region <?php echo $row['region'] ?></h4>
</center>
<br>
<div class="panel-group white" id="panel-profile">
<div class="panel panel-default white">
<div class="panel-heading white">
<a class="panel-title" data-toggle="collapse" data-parent="#panel-profile">User Details</a>
</div>
<div id="panel-element-info" class="panel-collapse collapse in">
<div class="panel-body">
<div class="col-md-4 column">
<hr>
<?php
    if ($row['date_inserted']){
?>   
      <div class="col-md-4">
      <p class="profile-details"><i class="fa fa-plus"></i>Date Added</p>
      </div>
      <div class="col-md-8">
      <p><?php echo $row['date_inserted'] ?></p>
      </div>
<?php } ?>
<?php
    if ($row['email']){
?>   
       <div class="col-md-4">
       <p class="profile-details"><i class="fa fa-envelope"></i>Email</p>
       </div>
       <div class="col-md-8">                                    
       <p><?php echo $row['email'] ?></p>
       </div>
<?php } ?>
</hr>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<a href="../docs/doc_add.php"><button class="btn btn-success btn-md">Add Document</button></a><br>
<a href="../profile/is_add.php"><button class="btn btn-success btn-md">Add New Information System</button></a><br>
<a href="../logs/log_add.php"><button class="btn btn-success btn-md">Add Change Log</button></a><br>
			
                 </div>
            </div>
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