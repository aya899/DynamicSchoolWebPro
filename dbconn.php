<?php
$host='localhost:4306';
$user='root';
$pw='';

$conn=mysqli_connect($host,$user,$pw);
/*if($conn){
    echo " connected successfully <br>";
}else{
    echo "Error connecting to mysql".mysqli_connect_error();
}*/

mysqli_select_db($conn,"school");
?>