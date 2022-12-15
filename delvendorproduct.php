<?php
require "database.php";
$conn = new mysqli("localhost", "root", "", "productmanagement");
$id = $_GET['id'];
$del = mysqli_query($conn,"DELETE FROM product WHERE id = '$id'"); 

if($del)
{
    mysqli_close($conn); 
    header("location:vendorin.php"); 
    exit;	
}
else
{
    echo "Error deleting record"; 
}

?>