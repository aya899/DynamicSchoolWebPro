<?php
include("dbconn.php");

// Get the student ID from the URL
$sid = $_GET['sid'];

// Delete query for the student
$query = "DELETE FROM `students` WHERE `sid` = '$sid'";
$res = mysqli_query($conn, $query);

// Check if the query was successful
if (!$res) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Redirect to the students page with a success message
    header("Location: students.php?msg=data deleted successfully");
}
?>
