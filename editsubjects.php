
<?php
include("dbconn.php");


$subid=$_GET['subid'];


$sql="SELECT * FROM `subjects` WHERE `subid`='$subid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

if(isset($_POST['update'])){
    $subname=$_POST['subname'];
   
    

   
   

   if(!empty($subname)){
 $query="UPDATE `subjects` SET `subname`='$subname' WHERE `subid`='$subid'";
    $res=mysqli_query($conn,$query);

    if(!$res){
        echo "Error: ".mysqli_error($conn);
    }else{
        
	   header("Location:subjects.php?msg=data updated successfully");
   }
  }
}






?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Subjects </title>
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
    height: 40%;
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
  <h2 class="label">Edit Subject Form</h2>
  <form class="form-group"  method="post">
  <div class="form-group">
      <label  class="label" >Name:</label>
 
        <input type="text" class="form-control"  placeholder="Enter name" name="subname" value="<?php echo  $row['subname'] ?>">
    
    </div>

    


   
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <button style="margin-top:15px;" type="submit" class="btn btn-primary" name="update">Update</button>
      <button style="margin-top:15px;" class="btn btn-success" type="button"><a href="subjects.php">Cancel</a></button>
      </div>
    </div>
  </form>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
