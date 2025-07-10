<?php
include("dbconn.php");


$tid=$_GET['tid'];

$query="DELETE FROM `teachers` WHERE `tid`='$tid'";
$res=mysqli_query($conn,$query);

if(!$res){
    echo "Error: ".mysqli_error($conn);
}else{
    
   header("Location:teachers.php?msg=data deleted successfully");
}

?>