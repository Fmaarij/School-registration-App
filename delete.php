<?php 
require 'connection.php';

$id = $_GET['s_id'];
$sql = "DELETE FROM students WHERE s_id='$id'";

if(mysqli_query($conn,$sql)){

    header('Location: students.php');
}else{
    echo "Error while deleting the students: " .$sql .mysqli_error($conn);
}
