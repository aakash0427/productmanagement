<?php
require 'database.php';
$conn = new mysqli("localhost", "root", "", "productmanagement");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "SELECT * FROM users WHERE fname LIKE 'a%'";
}
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Gender</th>
        <th>Email-Id</th>
        <th>Contact</th>
        <th>Action</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["gender"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["contact"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>