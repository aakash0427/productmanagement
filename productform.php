<?php
require "database.php";

if(isset($_POST['add'])){
  $productname=$_POST['productname'];
  $sku=$_POST['sku'];
  $pattern=implode($_POST['pattern']);
  $size=implode($_POST['size']);
  $quantity=$_POST['quantity'];
  $shipping=$_POST['shipping'];
  $status=$_POST['status'];

  $res= new Database();
  $res->insert('product',['productname'=>$productname,'sku'=>$sku,'pattern'=>$pattern ,'size'=>$size ,'quantity'=>$quantity , 'shipping'=>$shipping, 'status'=>$status]);
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
  <title>AddProductForm</title>
  
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
	height: 643px;
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
  width: 19%;
  margin-top: 12px;
  padding-right: 10px;
}
input[type="text"], input[type="tel"], input[type="email"], input[type="password"],input[type="number"],select
{
  width: 70%;
  height: 30px;
  padding: 5px 10px;
  margin-bottom: 10px;
  border: 1px solid #dadada;
  color: #888;
}
select{
  width: 74%;
  height: 45px;
  padding: 5px 10px;
  margin-bottom: 10px;
}
button{
  width: 100%;
  margin-top: 10px;
  padding: 10px;
  border: none;
  border-radius: 30px;
  background-color: #5c60f5;
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
      <h2>Add Product Form</h2>
  </div>
<div class="d-flex">
  <form action="" method="POST" autocomplete="off">
    <label>
      <span class="name">Product Name <span class="required">*</span></span>
      <input type="text" name="productname" id="productname">
    </label>
    <label>
      <span class="sku">SKU <span class="required">*</span></span>
      <input type="text" name="sku" id="sku">
    </label>
    <label>
      <span>Pattern <span class="required">*</span></span>
      <select id="multiselect" name="pattern[]" multiple="multiple">
        <option value="select" disabled>Select a pattern...</option>
        <option name="pattern" value="shirt">Shirt</option>
        <option name="pattern" value="tshirt">T-Shirt</option>
        <option name="pattern" value="pant">Pant</option>
        <option name="pattern" value="trouser">Trouser</option>
        <option name="pattern" value="jacket">Jacket</option>
      </select>
    </label>
    <div class="row">
        <label><span>Size <span class="required">*</span></span></label>
        <input type="Checkbox" name="size[]" id="size" value="small">Small
        <input type="Checkbox" name="size[]" id="size" value="medium">Medium
        <input type="Checkbox" name="size[]" id="size" value="large">Large
        <input type="Checkbox" name="size[]" id="size" value="xlarge">X-Large
    </div></br>
    <label>
      <span>Quantity <span class="required">*</span></span>
      <select name="quantity" id="quantity">
        <option value="select">Select quantity...</option>
        <option name="quantity" value="1">1</option>
        <option name="quantity" value="2">2</option>
        <option name="quantity" value="3">3</option>
        <option name="quantity" value="4">4</option>
        <option name="quantity" value="5">5</option>
      </select>
    </label>
    <label>
      <span class="shipping">Shipping<span class="required">*</span></span>
      <input type="number" value="" name="shipping" id="shipping">
    </label>
    <label>
      <span>Status <span class="required">*</span></span>
      <select name="status" id="sel">
        <option value="select">Select Status...</option>
        <option name="status" id="active" value="active">Active</option>
        <option name="status" id="inactive" value="inactive">Inactive</option>
      </select>
    </label>

    <button type="submit" name="add">Submit</button>
  </form>
 </div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script type="text/javascript">

</script>
</html>