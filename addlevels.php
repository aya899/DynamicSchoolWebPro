<?php

include("dbconn.php");



if(isset($_POST['add'])){
   $slevel=$_POST['slevel'];
   $grade=$_POST['grade'];
   $semester=$_POST['semester'];
  
 



   if(!empty($slevel)&&!empty($grade) &&!empty($semester)){
    $query="INSERT INTO `levels`(`slevel`,`grade` ,`semester`) 
	VALUES ('$slevel','$grade','$semester')";
    $res=mysqli_query($conn,$query);

    if(!$res){
        echo "Error: ".mysqli_error($conn);
    }else{
        
	   header("Location:levels.php?msg=data inserted successfully");
   }
  }
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add level </title>
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



<body>
<div class="home">
<div class="container">
<div class="form-group">
  <h2 class="label" >Add Level Form</h2>


  <form class="form-group"  method="post">
  <div class="form-group">
    
      <label class="label">level:</label>
      
        <input type="text" class="form-control"  placeholder="Enter level" name="slevel">
     
    </div>

    <div class="form-group">
    <label class="label">Grade:</label>
    <div >

    <select name="grade"  class="form-control">
    <option value="">Select Grade</option>
    <option value="">Primary level</option>
    <option value="1st">1st</option>
    <option value="2nd">2nd</option>
    <option value="3rd">3rd</option>
    <option value="4th">4th</option>
    <option value="5th">5th</option>
    <option value="6th">6th</option>
    <option value="">Middle level</option>
    <option value="7th">7th</option>
    <option value="8th">8th</option>
    <option value="9th">9th</option>
    <option value="">High level</option>
    <option value="10th">10th</option>
    <option value="11th">11th</option>
    <option value="12th">12th</option>
   </select>
</div>

</div>


    <div class="form-group">
      <label class="label" >semester:</label>
      
        <input type="text" class="form-control"  placeholder="Enter semester" name="semester">
      
    </div>
    </div>
    
  
   
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button style="margin-top:15px;" type="submit" class="btn btn-primary" name="add">Add</button>
 <button  style="margin-top:15px;  " class="btn btn-success" type="button"><a href="levels.php">Cancel</a></button>
      </div>
    </div>
  </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
