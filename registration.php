<?php
require "database.php";

if(isset($_POST["signup"])){
  $register = new Register();
  $result = $register->registration($_POST["fname"], $_POST["lname"], $_POST["gender"], $_POST["email"], $_POST["contact"],$_POST["password"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registration Successful'); </script>";
    header("Location: login.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Firstname or Email Has Already Taken'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Does Not Match'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  
  <style>
    @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');

body{
  background: url('http://all4desktop.com/data_images/original/4236532-background-images.jpg');
  font-family: 'Roboto Condensed', sans-serif;
  color: #262626;
  margin: 0% 0;
}
.container{
  width: 50%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;

  display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}

.screen {		
	background: linear-gradient(90deg, #5D54A4, #7C78B8);		
	position: relative;	
	height: 600px;
	width: 860px;	
	box-shadow: 0px 0px 24px #5C5696;
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
      <div class="screen">
  <div class="title">
      <h2>Vendor Registration Form</h2>
  </div>
<div class="d-flex">
  <form action="" method="POST" autocomplete="off">
    <label>
      <span class="fname">First Name <span class="required">*</span></span>
      <input type="text" name="fname">
    </label>
    <label>
      <span class="lname">Last Name <span class="required">*</span></span>
      <input type="text" name="lname">
    </label>
    <label>
      <span class="gender">Gender<span class="required">*</span></span>
    <input type="radio" id="gender" name="gender" value="male" class="gender" for="gender">Male</input>
    <input type="radio" id="gender" name="gender" value="female" class="gender" for="gender">Female</input> 
    </label>
    <label>
      <span>Email-id <span class="required">*</span></span>
      <input type="email" name="email"> 
    </label>
    <label>
      <span>Contact <span class="required">*</span></span>
      <input type="tel" name="contact"> 
    </label>
    <label>
      <span>Password <span class="required">*</span></span>
      <input type="password" name="password"> 
    </label>
    <label>
      <span>Confirm Password <span class="required">*</span></span>
      <input type="password" name="confirmpassword"> 
    </label>
    <button type="submit" name="signup">Submit</button>
  </form>
 </div>
</div>
</div>
</body>
</html>