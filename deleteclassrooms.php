<?php
include("dbconn.php");

$cid = $_GET['cid'];

$query="DELETE FROM `classrooms` WHERE `cid`='$cid'";
$res=mysqli_query($conn,$query);

if(!$res){
    echo "Error: ".mysqli_error($conn);
}else{
    
   header("Location:classrooms.php?msg=data deleted successfully");
}

?>
