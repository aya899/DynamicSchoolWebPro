<?php

include("dbconn.php");

if (isset($_POST['add'])) {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $academic_year = $_POST['academic_year'];
    $level = $_POST['level'];
    $classroom = $_POST['classroom'];

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($gender) && !empty($address) && !empty($academic_year)
    && !empty($level)&& !empty($classroom)) {
        $query = "INSERT INTO `students`( `sname`, `semail`, `sphone`, `sgender`, `address`, `academic_year`, `lid`, `cid`) 
                  VALUES ( '$name', '$email', '$phone', '$gender', '$address', '$academic_year', '$level', '$classroom')";
        $res = mysqli_query($conn, $query);

        if (!$res) {
            echo "Error: " . mysqli_error($conn);
        } else {
            header("Location: students.php?msg=Student added successfully");
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Student</title>
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
<body >
<div class="home">
<div class="container">

    <h2 class="label">Add Student Form</h2>
    <form class="form-group" method="post">

        <div class="form-group">
            <label class="label">Name:</label>
           
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            
        </div>

        <div class="form-group">
            <label class="label">Email:</label>
            
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            
        </div>

        <div class="form-group">
            <label class="label">Phone:</label>
            
                <input type="text" class="form-control" placeholder="Enter phone" name="phone">
           
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
            <label class="label">Address:</label>
            
                <input type="text" class="form-control" placeholder="Enter address" name="address">
            
        </div>

        <div class="form-group">
            <label class="label">Academic Year:</label>
            
                <input type="text" class="form-control" placeholder="Enter academic year" name="academic_year">
            
        </div>

        <div class="form-group">
            <label class="label">Level:</label>
            
                                <select class="form-control" name="level" id="">
													<option value=" ">Select Level</option>
													<?php
													$select_query="SELECT * FROM `levels`";
													$res_lev=mysqli_query($conn,$select_query);
													while($row_data=mysqli_fetch_assoc($res_lev)){
													  $slevel=$row_data['slevel'];
													  $lid=$row_data['lid'];
													  echo "<option value=' $lid'>$slevel</option>";
													}
											       ?>
										</select>
            
        </div>

        <div class="form-group">
            <label class="label">Classroom:</label>
            
                                <select class="form-control" name="classroom" id="">
													<option value=" ">Select Classroom</option>
													<?php
													$select_query="SELECT * FROM `classrooms`";
													$res_cr=mysqli_query($conn,$select_query);
													while($row_data=mysqli_fetch_assoc($res_cr)){
                                                    $roomnumber=$row_data['roomnumber'];
													  $cid=$row_data['cid'];
													  echo "<option value=' $cid'>$roomnumber</option>";
													}
											       ?>
										</select>
            
        </div>





        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button  style="margin-top:15px;" type="submit" class="btn btn-primary"  name="add">Add</button>
                <button  style="margin-top:15px;" class="btn btn-success" type="button"><a href="students.php">Cancel</a></button>
            </div>
        </div>
    </form>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
