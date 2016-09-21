<?php
session_start();

if(!isset($_SESSION['sees_username'])){
	header("location: ../login.php");
} else {
	echo "<script type='text/javascript'>alert('You are logged in as ". $_SESSION['sees_username'] ."'); </script>";
}
?>
<?php include "../../config.php"; ?>
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
<?php
$target = "documents//"; 
if(!is_dir($target)) mkdir($target);
$target = $target . basename( $_FILES['uploaded']['name']); 
$ok=1;
$id = $_REQUEST['id'];
$fileFormat=$_REQUEST['fileformat'];
$uploadedBy=$_REQUEST['uploadedby'];
$version=$_REQUEST['version'];
$fname=($_FILES['uploaded']['name']); 
$tmpName  = $_FILES['uploaded']['tmp_name'];
$fileSize = $_FILES['uploaded']['size'];
$fileType = $_FILES['uploaded']['type'];


$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc()){
$fname = addslashes($fname);}


include "../../config.php";
  
$sql="UPDATE tbl_is_doc SET fileformat = '$fileFormat',uploadedby = '$uploadedBy',version = '$version',name = '$fname',size = '$fileSize',date = now(),type = '$fileType',content = '$content' WHERE id ='$id'"; 
if (!mysqli_query($con,$sql)) { 
die ('error in db: '. mysqli_error($con)); 
}
 
if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) { 

echo "<script type='text/javascript'>alert('This file ". basename( $_FILES['uploaded']['name']) ." has been uploaded.'); </script>";     
    echo '<div class="alert alert-success" id="success-alert">
    <span class="centered">
	<a href="doc_list.php"><button type="button" class="close" data-dismiss="alert" aria-label="close">
	&times;</button></a>
    <strong>Success! </strong>
	Record has been updated<br>
    <a href="doc_list.php"><button type="button" class="btn btn-"><span class="glyphicon glyphicon-ok">OK</span></button></a>
	</span>
	</div>';
 } else { 
echo "<script type='text/javascript'>alert('Sorry, there was a problem uploading your file.'); document.location.href = 'javascript: history.go(-1)' </script>";
    } 
	//$time = time();	
	$limit_size=25600000; /*limit file up to 25MB*/
	if( $_FILES['uploaded']['size'] >= $limit_size ){
	    echo "<script type='text/javascript'>alert('This file exceeds the 25MB attachment limit. Please edit file and upload again.'); document.location.href = 'javascript: history.go(-1)' </script>";
		exit;
	}
mysqli_close($con);
?>
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