<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php include_once "../template/header.php" ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Info System
						<small>
						<i class="icon-double-angle-right"></i>
							 View record
						</small>
					</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                    <span class="pull-left"></span>
					
	
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
t1.id = '$id'

ORDER BY
t1.id ASC
LIMIT 1");

?>


	<style type="text/css">

</style>	
<div class="panel-body">
 <div class="dataTable_wrapper"> 
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>   
 <tbody>


 <?php while ($row=mysqli_fetch_array($result)) { ?>
 
	<tr>
    <th>Name</th>
	<td><?php echo $row ['name'] ?></td>
	</tr>
	<tr>
	<th>Category</th>
	<td><?php echo $row['category']?><?php echo $row ['categoryname']  ?></td>
	</tr>
	<tr>
	<th>Tracker</th>
	<td><?php echo $row['tracker'] ?><?php echo $row ['trackername']?></td>
	</tr>
	<tr>
	<th>Access</th>
    <td><?php echo $row['access']?><?php echo $row ['accessname'] ?></td>
	</tr>
	<tr>
	<th>Front End</th>
    <td><?php echo $row['front_end'] ?><?php echo $row ['frontendname']?> </td>
    </tr>
	<tr>
    <th>Rdbms</th>	
	<td><?php echo $row['rdbms'] ?><?php echo $row ['rdbmsname']?></td>
	</tr>
	<tr>
	<th>Url</th>
	<td><?php echo $row['url'] ?></td>
	</tr>
	<tr>
	<th>Cron</th>
	<td><?php echo $row['cron'] ?></td>
	</tr>
	<tr>
	<th>Api</th>
    <td><?php echo $row['api'] ?></td>
	</tr>
	<tr>
	<th>Training url</th>
    <td><?php echo $row['training_url'] ?></td>
	</tr>
	<tr>
	<th>Last Va</th>
    <td><?php echo $row['last_va'] ?></td>
    </tr>
	<tr>
	<th>Remarks</th>
	<td><?php echo $row['remarks'] ?></td>
	</tr>
	<tr>
	<th>Assigned to</th>
	<td><?php echo $row['assigned_to']?><?php echo $row ['group_name']?></td>
	</tr>
	<tr>
	<th>Business owner</th>
   <td><?php echo $row['business_owner']?></td>
   </tr>
    </thead>
     </table>
	 </div>
      </div>
<?php
$result2=mysqli_query($con,"select * from tbl_is INNER JOIN tbl_is_doc on tbl_is.id = tbl_is_doc.isid WHERE tbl_is.id=$id");
?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h4><a href="../docs/doc_list.php">Info System Documents</a></h4>
</div>
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th class="col-xs">Action</th>
	<th class="col-xs">Info System Name</th>
	<th class="col-xs">File Name</th>
	<th class="col-xs">Size(bytes)</th>
	<th class="col-xs">Type</th>
</tr>
</thead>
<tbody>
<?php
while ($rws=mysqli_fetch_array($result2)) {
?>  
	<tr>
	<td>
    <a href="../docs/doc_view.php?id=<?php echo $rws['id'] ?>"><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-zoom-in">View</span></button>
	<a href="../docs/doc_edit.php?id=<?php echo $rws['id'] ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit">Edit</span></button>
	</td>
	<td><?php echo $row['name'] ?></td>
	<td><a href="../docs/doc_view.php?id=<?php echo $rws['id'] ?>"><?php echo $rws['name'] ?></a></td>
	<td><?php echo $rws['size'] ?></td>
	<td><?php echo $rws['type'] ?></td>
	</tr>
</tbody>
	
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>
<?php
$result3=mysqli_query($con,"select * from tbl_is INNER JOIN tbl_is_log on tbl_is.id = tbl_is_log.is_id WHERE tbl_is.id=$id");
?>
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h4><a href="../logs/log_list.php">Info System Change Log</a></h4>
</div>
<div class="panel-body">
<div class="dataTable_wrapper">
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
<tr>
    <th class="col-xs">Action</th>
	<th class="col-xs">Info System Name</th>
	<th class="col-xs">Log Name</th>
	<th class="col-xs">Log Type</th>
	<th class="col-xs">Log Description</th>
</tr>
</thead>
<tbody>
<?php
while ($rw=mysqli_fetch_array($result3)) {
?>  
	<tbody>
	<tr>
	<td>
    <a href="../logs/log_view.php?id=<?php echo $rw['id'] ?>"><button type="button" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-zoom-in">View</span></button>
	<a href="../logs/log_edit.php?id=<?php echo $rw['id'] ?>"><button type="button" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-edit">Edit</span></button>
	</td>
	<td><?php echo $row['name'] ?></td>
	<td><a href="../logs/log_view.php?id=<?php echo $rw['id'] ?>"><?php echo $rw['log_name'] ?></a></td>
	<td><?php echo $rw['log_type'] ?></td>
	<td><?php echo $rw['log_description'] ?></td>
	</tr>
	</tbody>
	
<?php } ?>
</table>
</div>
</div>
</div>
</div>
</div>
<?php } ?>
<?php
mysqli_close($con); 
?>	
<td><a href="javascript:history.back()"><button type="button" class="btn btn-success">Back</button></a></td>	
 
  <ul class="pager">
</ul>  
						
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
	

</body>
</html>