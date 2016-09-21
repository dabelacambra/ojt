<?php

/* 
connection to database (definition):
$host - define your host here, if using a remote host, specify the url of the hostname
$db_username - define your database username access here
$db_password - define your database password access here
$db_name - define the database name that will be accessed here
*/

include "../../config.php";
// placeholder and query executor to get the values from the tables person and services, the results are
// then placed in $result which will be needed later below	
$result=mysqli_query($con,"select * FROM tbl_is");

?>
<?php include_once "../template/header.php" ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
					<small>
						<i class="icon-double-angle-right"></i>
							>> Add record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<form action="log_post.php" method="post" onsubmit="return formValidate()">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Record
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                   
                                       <form action="log_post.php" method="post" onsubmit="submitform()">
									    <input class="hidden" name="id">
									   <div class="form-group">
                                            <label>IS_id</label>
                                            <select id="isId" class="form-control" name = "is_id" required>
                                                <option value="" disabled selected>Please Select</option>									
												<?php 
												// fetches the result from $result and be readied to be displayed in html
												// the format for while syntax is while (parameters) {actions..}
												while ($row=mysqli_fetch_array($result)) { 
												?>
												<td name="is_id"><option value='<?php echo $row['id'] ?><?php echo $row['name']  ?>'><?php echo $row['id'] ?>-<?php echo $row['name']  ?></option></td>											
												<?php } ?>										
                                            </select>
                                        </div>
										<div class="form-group" >
                                            <label>Log Name</label>
                                            <input class="form-control" placeholder="Enter Log Name" type="text" name="log_name" required>
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Log Type</label>
                                            <input class="form-control" placeholder="Enter Log Type" type="text" name="log_type" required></input>
                                        </div>										
										<div class="form-group">
											<label>Log Description</label>
											<textarea class="form-control" placeholder="Enter Log Desription" type="text" rows="3" name="log_description" required></textarea>
										</div>
                                         <div class="form-group">
                                            <label>Date Changed</label>
                                            <input class="form-control" placeholder="Enter Uploaded Date" type="date" name="date_uploaded" required>
                                        </div>	
										  <div class="form-group" name="uploaded by">
                                            <label>Changed by</label>
                                            <input class="form-control" placeholder="Enter Uploaded by" type="text" name="uploaded_by" required>
                                        </div>
										<div class="form-group" name="fix description">
											<label>Fix Description</label>
											<textarea class="form-control" placeholder="Enter Fix Description" type="text" rows="3" name="fix_description" required></textarea>
										</div>
                                        
                                        								
                                         <a href="log_list.php"><button type="submit" class="btn btn-info">Submit</button></a>
                                        <button type="reset" class="btn btn-success">Reset</button>
										<a href="log_list.php"><button type=button class = "btn btn-info btn">LIST</button></a>
                                    </form>
<script>
function submitform() {
  var e= document.getElementById("isId");
  var strUser = e.options[e.selectedIndex].value;
  
  var strUser = e.option[e.selectedIndex].text; 
  if(strUser==0)
  {
	  alert("Please select")
  }	
  var f = document.getElementsByName('log_name')[0];
  if(f.checkValidity()) {
    f.submit();
  } else {
    alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('log_type')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else{
	  alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('log_description')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('date_uploaded')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  var f= document.getElementsByName('uploaded_by')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  var f = document.getElementsByName('fix_description')[0];
  if(f.checkValidity()) {
	  f.submit();
  } else {
	  alert(document.getElementById('example').validationMessage);
  }
  }
}
</script>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                
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
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Custom DatePicker -->
	<link rel="stylesheet" href="/js/jquery-ui.css">
	<script src="/js/jquery-1.12.4.js"></script>
	<script src="/js/jquery-ui.js"></script>
	<script>
	  $( function() {
		$( "#datepicker" ).datepicker();
	  } );
	</script>
</body>
</html>



