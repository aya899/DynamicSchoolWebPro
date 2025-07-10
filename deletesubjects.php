<?php
include("dbconn.php");


$subid=$_GET['subid'];

$query="DELETE FROM `subjects` WHERE `subid`='$subid'";
$res=mysqli_query($conn,$query);

if(!$res){
    echo "Error: ".mysqli_error($conn);
}else{
    
   header("Location:subjects.php?msg=data deleted successfully");
}

?>