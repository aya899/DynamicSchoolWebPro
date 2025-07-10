<?php

include("dbconn.php");


$tcid=$_GET['tcid'];

$sql="SELECT * FROM `teacher_classroom` WHERE `tcid`='$tcid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['update'])){
   $teacher=$_POST['teacher'];
   $classroom=$_POST['classroom'];
   


   if(!empty($teacher)&&!empty($classroom)){
    $query="UPDATE `teacher_classroom` SET `cid`='$classroom',`tid`='$teacher' WHERE `tcid`='$tcid'";
    $res=mysqli_query($conn,$query);

    if(!$res){
        echo "Error: ".mysqli_error($conn);
    }else{
        
	   header("Location:teacher_classroom.php?msg=data inserted successfully");
   }
  }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Teacher ClassRoom </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  
  <style>
        *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'poppins', sans-serif;

}

body{
  background: linear-gradient(#111,#222);
   
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.home{
    width: 60%;
    height: 60%;
    background: rgba(255,255,255,0.1); /*0.1 give the light of this color*/
    border-radius: 20px;
    overflow: hidden;
}    



button a{
  color:#fff;
  text-decoration: none;
  
}

.label{
  color:#fff;
  font-family: 'poppins', sans-serif;
  margin:10px;
  
}
    </style>
</head>
<body >
<div class="home">
<div class="container">
  <h2 class="label">Edit Teacher Classroom Form</h2>
  <form class="form-group"  method="post">
  

    <div class="form-group">
      <label  class="label" >Teacher:</label>
      
                     <select class="form-control" name="teacher" id="">
													<option value=" "><?php echo  $row['tid'] ?></option>
													<?php
													$select_query="SELECT * FROM `teachers`";
													$res_tea=mysqli_query($conn,$select_query);
													while($row_data=mysqli_fetch_assoc($res_tea)){
													  $tname=$row_data['tname'];
													  $tid=$row_data['tid'];
													  echo "<option value=' $tid'>$tname</option>";
													}
											       ?>
												</select>
      
</div>


<div class="form-group">
      <label  class="label" >ClassRoom:</label>
      
                     <select class="form-control" name="classroom" id="">
													<option value=" "><?php echo  $row['cid'] ?></option>
													<?php
													$select_query="SELECT * FROM `classrooms`";
													$res_class=mysqli_query($conn,$select_query);
													while($row_data=mysqli_fetch_assoc($res_class)){
													  $roomnumber=$row_data['roomnumber'];
													  $cid=$row_data['cid'];
													  echo "<option value=' $cid'>$roomnumber</option>";
													}
											       ?>
												</select>
    
</div>


   
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button style="margin-top:15px;" type="submit" class="btn btn-primary" name="update">Update</button>
 <button  style="margin-top:15px;" class="btn btn-success" type="button"><a href="teacher_classroom.php">Cancel</a></button>
      </div>
    </div>
  </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
