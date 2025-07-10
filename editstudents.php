<?php
include("dbconn.php");

// Get the student ID from the URL
$sid = $_GET['sid'];

// Fetch student data for the given ID
$sql = "SELECT * FROM `students` WHERE `sid`='$sid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
    // Get the updated values from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $academic_year = $_POST['academic_year'];
    $level = $_POST['level'];
    $classroom = $_POST['classroom'];

    // Validate that fields are not empty
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($gender) && !empty($address) && !empty($academic_year)
    && !empty($level)&& !empty($classroom)) {
        // Update query
        $query = "UPDATE `students` SET 
            `sname`='$name', 
            `semail`='$email', 
            `sphone`='$phone', 
            `sgender`='$gender', 
            `address`='$address', 
            `academic_year`='$academic_year' ,
            `lid`='$level',
            `cid`='$classroom' 
            WHERE `sid`='$sid'";
            $res = mysqli_query($conn,$query);

        if (!$res) {
            echo "Error: " . mysqli_error($conn);
        } else {
            // Redirect to the students page with a success message
            header("Location: students.php?msg=data updated successfully");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Student</title>
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
  <h2 class="label">Edit Student Form</h2>
  <form class="form-group" method="post">
    <div class="form-group">
      <label class="label">Name:</label>
     
        <input type="text" class="form-control" placeholder="Enter name" name="name" value="<?php echo $row['sname']; ?>">
      
    </div>

    <div class="form-group">
      <label class="label">Email:</label>
     
        <input type="email" class="form-control" placeholder="Enter email" name="email" value="<?php echo $row['semail']; ?>">
      
    </div>

    <div class="form-group">
      <label class="label">Phone:</label>
     
        <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="<?php echo $row['sphone']; ?>">
    
    </div>

  
    <label style="margin:10px 5px; color:#fff" >Gender:</label>
    <div class="form-check form-check-inline">
        <input  class="form-check-input" type="radio" name="gender" value="Male" <?php if ($row['sgender'] == 'Male') echo "checked"; ?>>
        <label class="form-check-label" style="color:#fff;"> Male</label>
</div>
<div class="form-check form-check-inline">
        <input  class="form-check-input" type="radio" name="gender" value="Female" <?php if ($row['sgender'] == 'Female') echo "checked"; ?>> 
        <label class="form-check-label"  style="color:#fff;"> Female</label>
      </div>
    

    <div class="form-group">
      <label class="label">Address:</label>
      
        <input type="text" class="form-control" placeholder="Enter address" name="address" value="<?php echo $row['address']; ?>">
      
    </div>

    <div class="form-group">
      <label class="label">Academic Year:</label>
      
        <input type="text" class="form-control" placeholder="Enter academic year" name="academic_year" value="<?php echo $row['academic_year']; ?>">
      
    </div>

    <div class="form-group">
            <label class="label">Level:</label>
            
                                <select class="form-control" name="level" id="">
													<option value=" "><?php echo $row['lid']; ?></option>
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
													<option value=" "><?php echo $row['cid']; ?></option>
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
        <button style="margin-top:15px;" type="submit" class="btn btn-primary" name="update">Update</button>
        <button style="margin-top:15px;" class="btn btn-success" type="button"><a  href="students.php">Cancel</a>
        </button>
      </div>
    </div>
  </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
