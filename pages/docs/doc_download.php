<?php
  session_start();
  if(!isset($_SESSION['sees_username']) && !isset($_SESSION['sees_password']))
  {
    header("location: ../login.php");
    exit;
  }
?>
<?php 
   
$path = $_SERVER['DOCUMENT_ROOT']."/ismp/pages/docs/documents/"; 
$fullPath = $path.$_GET['download_file']; 
  
if ($fd = fopen ($fullPath, "r")) { 
    $fsize = filesize($fullPath); 
    $path_parts = pathinfo($fullPath); 
    $ext = strtolower($path_parts["extension"]); 
    switch ($ext) { 
        case "pdf": 
        header("Content-type: application/pdf"); 
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\"");  
        break; 
        default; 
        header("Content-type: application/octet-stream"); 
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\""); 
    } 
    header("Content-length:" . $fsize); 
    header("Cache-control: private"); 
    while(!feof($fd)) { 
        $buffer = fread($fd, 2048); 
        echo $buffer; 
    } 
} 
fclose ($fd); 
exit; 
?>
           