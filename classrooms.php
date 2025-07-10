<?php
include("dbconn.php");


if(isset($_POST['submit'])){
  $search=$_POST['search'];
  if(!empty($search)){
   $sql="SELECT * FROM classrooms where `roomnumber` like '%$search%'";

   $res=mysqli_query($conn,$sql);

  }else{
    $sql="SELECT * FROM classrooms";
      $res=mysqli_query($conn,$sql);
  }

  

  
}else{
  $sql="SELECT * FROM classrooms";
      $res=mysqli_query($conn,$sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">   
     <title>Classrooms</title>

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
    width: 85%;
    height: 80%;
    background: rgba(255,255,255,0.1); /*0.1 give the light of this color*/
    border-radius: 20px;
    overflow: hidden;
}    

nav{
    width:90% ;
    padding: 25px 0 ;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: auto;

}

nav ul li{
    list-style: none;
    display: inline-block;
    margin: 0 8px;

}
nav ul li a{
    text-decoration: none;
    color: #fff;
    font-size:17px ;
    font-weight:500 ;
}

nav ul li a:hover{
    
    color: #f85a0b;
    
}

nav ul li ul.drop li{
    display: block;
    
    margin: 4px 0px;

}

nav ul li ul.drop {
     width: auto;
    background-color:  rgba(255,255,255,0.1);
    position: absolute;
    z-index: 999;
    display: none;
}
nav ul li:hover ul.drop{
    display: block;
   
}

button a{
  color:#fff;
  text-decoration: none;

  
}

 tr{
  transition: 0.2s ease-in all;
  cursor: pointer;
  
}

tr:hover{
  
  transform: scale(1.01);
  box-shadow: 2px 2px 12px rgba(0,0,0,0.2), -1px -1px 8px rgba(0,0,0,0.2);
}

.form1{
  position:relative;
}
.search{
position:absolute;
top:0;
right:0;
width:50px;
height:100%;
cursor:pointer;
border:none;
background:#fff;
border-radius:5px;
}


    </style>
</head>
<body>
<div class="home">
<nav >
            
           
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="teachers.php">Teachers</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="levels.php">Levels</a></li>
                <li><a href="classrooms.php">Classrooms</a></li>
                <li><a href="subjects.php">Subjects</a></li>
                <li><a href="teacher_classroom.php">Teachers Classrooms</a></li>
                <li><a href="">Views  &#x25BE; </a>
                <ul class="drop">
                <li><a href="teacherview.php">Teachers View</a></li>
                <li><a href="studview.php">Students View</a></li>
                </ul>
                </li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            
            <form class="form1" action="" method="post">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="search" name="submit"><img src="./images/search.png"  width="30px" height="30px"></button>
    </form>
        </nav>



<div class="container">
  

												 
    <button class="btn btn-primary" type="button" ><a href="addclassrooms.php">Add classroom</a></button>
                                                                                                                                    

  <h2 style="color:#fff;">Classrooms Data</h2>
              
  <table  class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>Room Number</th>
        <th>Capacity</th>
        <th>Edit</th>
        <th>Delete</th>
        

      </tr>
    </thead>
    <tbody>
      <?php
              if(mysqli_num_rows($res)>0){
              foreach($res as $row){
      ?>
        <tr>
        <td><?php echo $row['cid'] ?></td>
        <td><?php echo $row['roomnumber'] ?></td>
             <td><?php echo $row['capacity'] ?></td>
             
            
            <td>
             <a href="editclassrooms.php?cid=<?php echo $row['cid']?>"> <img src="./images/edit1.png" alt="Edit" width="30px" height="30px"> </a>
            </td>
            <td>
              <a href="deleteclassrooms.php?cid=<?php echo $row['cid']?>"><img src="./images/delete1.png" alt="Delete" width="30px" height="30px"></a>
            </td>
            <?php
            }
            }else {
              echo "<tr><td colspan='3'>No records found</td></tr>";
          }
           ?>
        </tr>

    
    </tbody>
   </table>
</div>
        </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>