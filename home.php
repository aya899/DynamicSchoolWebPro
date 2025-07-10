<?php
session_start();

// Redirect to login if the user is not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="home">

    
        
    
        <nav>
            <img src="images/logo.png" class="logo" alt="logo"  >
           
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="teachers.php">Teachers</a></li>
                <li><a href="students.php">Students</a></li>
                <li><a href="levels.php">Levels</a></li>
                <li><a href="classrooms.php">Classrooms</a></li>
                <li><a href="subjects.php">Subjects</a></li>
                <li><a href="teacher_classroom.php">Teachers Classrooms</a></li>
                <li><a href="">Views &#x25BE;</a>
                <ul class="drop">
                <li><a href="teacherview.php">Teachers View</a></li>
                <li><a href="studview.php">Students View</a></li>
                </ul>
                </li>
                <li><a href="logout.php">Logout</a></li>


            </ul>
        </nav>
        <div class="content">
           <div class="text">
             <h2><span>School</span> Management System</h2>
           <!-- <a href="authenticate.php">Login</a>-->
            </div>
            <div class="image">

            <img src="./images/school3.jpg">
        
         
       
            </div> 
    </div>
</div>
</body>
</html>