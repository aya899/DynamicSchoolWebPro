<?php
include("dbconn.php");


$lid=$_GET['lid'];

$query="DELETE FROM `levels` WHERE `lid`='$lid'";
$res=mysqli_query($conn,$query);

if(!$res){
    echo "Error: ".mysqli_error($conn);
}else{
    
   header("Location:levels.php?msg=data deleted successfully");
}

?>