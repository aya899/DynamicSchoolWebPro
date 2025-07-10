<?php
include("dbconn.php");


$tcid=$_GET['tcid'];

$query="DELETE FROM `teacher_classroom` WHERE `tcid`='$tcid'";
$res=mysqli_query($conn,$query);

if(!$res){
    echo "Error: ".mysqli_error($conn);
}else{
    
   header("Location:teacher_classroom.php?msg=data deleted successfully");
}

?>