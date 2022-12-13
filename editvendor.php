<?php
require 'database.php';
$conn = new mysqli("localhost", "root", "", "productmanagement");

if(isset($_POST['editvendor']))
{
 $id=$_GET['id'];
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $gender = $_POST['gender'];
 $email = $_POST['email'];
 $contact = $_POST['contact'];
 
 
 $res= new Database();
 $res->edit('users',$id,$fname,$lname,$gender,$email,$contact);
if ($res == true) {
 header('location:dashboard.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Vendor</title>
  
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

body{
  background: url('http://all4desktop.com/data_images/original/4236532-background-images.jpg');
  font-family: 'Roboto Condensed', sans-serif;
  color: #262626;
  margin: 5% 0;
}
.container{
  width: 50%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}
@media (min-width: 1200px)
{
  .container{
    max-width: 1140px;
  }
}
.d-flex{
  display: flex;
  flex-direction: row;
  background: #f6f6f6;
  border-radius: 0 0 5px 5px;
  padding: 25px;
}
form{
  flex: 4;
}
.title{
  background: -webkit-gradient(linear, left top, right bottom, color-stop(16, #5c60f5), color-stop(65, #776bcc));
  background: -moz-linear-gradient(top left, #5c60f5 16%, #776bcc 65%);
  background: -ms-linear-gradient(top left, #5c60f5 16%, #776bcc 65%);
  background: -o-linear-gradient(top left, #5c60f5 16%, #776bcc 65%);
  background: linear-gradient(to bottom right, #5c60f5 16%, #776bcc 65%);
  border-radius:5px 5px 0 0 ;
  padding: 20px;
  color: #f6f6f6;
}
h2{
  margin: 0;
  padding-left: 15px; 
}
.required{
  color: red;
}
label, table{
  display: block;
  margin: 15px;
}
label>span{
  float: left;
  width: 18%;
  margin-top: 12px;
  padding-right: 10px;
}
input[type="text"], input[type="tel"], input[type="email"], input[type="password"]
{
  width: 70%;
  height: 30px;
  padding: 5px 10px;
  margin-bottom: 10px;
  border: 1px solid #dadada;
  color: #888;
}
input[type="radio"]:checked + .gender {
    font-weight: bold;
}
button{
  width: 100%;
  margin-top: 10px;
  padding: 10px;
  border: none;
  border-radius: 30px;
  background: #5c60f5;
  color: #fff;
  font-size: 15px;
  font-weight: bold;
}
button:hover{
  cursor: pointer;
  background: #776bcc;
}
</style>
</head>
<body>
    <div class="container">
  <div class="title">
      <h2>Vendor Update Form</h2>
  </div>
<div class="d-flex">
  <form action="" method="POST" autocomplete="off">
    <?php
    $id = $_GET['id'];
    $rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE id = $id"));
    ?>
    <input type="hidden" id="id" value="<?php echo $rows['id'];?>">
    <label>
      <span class="fname">First Name <span class="required">*</span></span>
      <input type="text" name="fname" value="<?php echo $rows['fname'];?>">
    </label>
    <label>
      <span class="lname">Last Name <span class="required">*</span></span>
      <input type="text" name="lname" value="<?php echo $rows['lname'];?>">
    </label>
    <label>
      <span class="gender">Gender<span class="required">*</span></span>
    <input type="radio" id="gender" name="gender" value="<?php echo $rows['gender'];?>" class="gender" for="gender">Male</input>
    <input type="radio" id="gender" name="gender" value="<?php echo $rows['gender'];?>" class="gender" for="gender">Female</input> 
    </label>
    <label>
      <span>Email-id <span class="required">*</span></span>
      <input type="email" name="email" value="<?php echo $rows['email'];?>"> 
    </label>
    <label>
      <span>Contact <span class="required">*</span></span>
      <input type="tel" name="contact" value="<?php echo $rows['contact'];?>"> 
    </label>
    <label>
      <span>Password <span class="required">*</span></span>
      <input type="password" name="password" value="<?php echo $rows['password'];?>"> 
    </label>
    <label>
      <span>Confirm Password <span class="required">*</span></span>
      <input type="password" name="confirmpassword"> 
    </label>
    <button type="submit" name="editvendor">Submit</button>
  </form>
 </div>
</div>
</body>
</html>