<?php
require "database.php";
$conn = new mysqli("localhost", "root", "", "productmanagement");
$id = $_GET['id'];
$del = mysqli_query($conn,"DELETE FROM users WHERE id = '$id'"); 

if($del)
{
    mysqli_close($conn); 
    header("location:vendor.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}

?>