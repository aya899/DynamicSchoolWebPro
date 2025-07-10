<?php

include("dbconn.php");



if(isset($_POST['add'])){
   $name=$_POST['name'];
   $phone=$_POST['phone'];
   $email=$_POST['email'];
   $gender=$_POST['gender'];
   $experience=$_POST['experience'];
   $address=$_POST['address'];
   $salary=$_POST['salary'];
   $subject=$_POST['subject'];



   if(!empty($name)&&!empty($phone) &&!empty($email) &&!empty($gender) &&!empty($experience) &&!empty($address)
   &&!empty($salary)&&!empty($subject)){
    $query="INSERT INTO `teachers`(`tname`, `tphone`, `temail`,`tgender`,`experience`,`address`,`salary`,`subid`) 
	VALUES ('$name','$phone','$email','$gender','$experience','$address','$salary','$subject')";
    $res=mysqli_query($conn,$query);

    if(!$res){
        echo "Error: ".mysqli_error($conn);
    }else{
        
	   header("Location:teachers.php?msg=data inserted successfully");
   }
  }
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Teacher </title>
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
    height: 90%;
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
  margin:5px;
  
}
    </style>

</head>

<body>
<div class="home">
<div class="container">

  <h2 class="label">Add Teacher Form</h2>
  <form class="form-group"  method="post">
  <div class="form-group">
      <label class="label" >Name:</label>
      
        <input type="text" class="form-control"  placeholder="Enter name" name="name">
      </div>
    

    <div class="form-group">
      <label class="label" >Phone:</label>
                
        <input type="text" class="form-control"  placeholder="Enter phone" name="phone">
      
    </div>

  <div class="form-group">
      <label class="label" >Email:</label>
      
        <input type="email" class="form-control"  placeholder="Enter email" name="email">
      
    </div>


   
    <label style="margin:10px 5px; color:#fff" >Gender:</label>
    <div class="form-check form-check-inline">
 <input class="form-check-input" type="radio" value="Male" name="gender">
  <label class="form-check-label" style="color:#fff;"> Male</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" value="Female" name="gender">
  <label class="form-check-label"  style="color:#fff;"> Female</label>
</div>

    <div class="form-group">
      <label class="label" >experience:</label>
      
        <input type="text" class="form-control"  placeholder="Enter experience" name="experience">
    
    </div>

    <div class="form-group">
      <label class="label" >Address:</label>
      
        <input type="text" class="form-control"  placeholder="Enter address" name="address">
      
    </div>

    <div class="form-group">
      <label class="label" >Salary:</label>
      
        <input type="text" class="form-control"  placeholder="Enter salary" name="salary">
      
    </div>

    <div class="form-group">
      <label class="label" >subject:</label>
      
                     <select class="form-control" name="subject" id="">
													<option value=" ">Select subject</option>
													<?php
													$select_query="SELECT * FROM `subjects`";
													$res_sub=mysqli_query($conn,$select_query);
													while($row_data=mysqli_fetch_assoc($res_sub)){
													  $subname=$row_data['subname'];
													  $subid=$row_data['subid'];
													  echo "<option value=' $subid'>$subname</option>";
													}
											       ?>
												</select>
      
</div>

   
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button style="margin-top:15px;" type="submit" class="btn btn-primary" name="add">Add</button>
       <button  style="margin-top:15px;" class="btn btn-success" type="button"><a href="teachers.php">Cancel</a></button>
      </div>
    </div>
  </form>
</div>
<div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
