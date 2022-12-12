<?php
require "database.php";

if(isset($_POST['add'])){
  $productname=$_POST['productname'];
  $sku=$_POST['sku'];
  $pattern=$_POST['pattern'];
  $size=$_POST['size'];
  $quantity=$_POST['quantity'];
  $shipping=$_POST['shipping'];

  $res= new Database();
  $res->insert('product',['productname'=>$productname,'sku'=>$sku,'pattern'=>$pattern ,'size'=>$size ,'quantity'=>$quantity , 'shipping'=>$shipping]);
//   if ($res == true) {
//     header('location:dashboard.php');
//   }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ProductForm</title>
  
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
  background: -webkit-gradient(linear, left top, right bottom, color-stop(0, #5195A8), color-stop(100, #70EAFF));
  background: -moz-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
  background: -ms-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
  background: -o-linear-gradient(top left, #5195A8 0%, #70EAFF 100%);
  background: linear-gradient(to bottom right, #5195A8 0%, #70EAFF 100%);
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
  background: #428a7d;
}
</style>
</head>
<body>
    <div class="container">
  <div class="title">
      <h2>Product Form</h2>
  </div>
<div class="d-flex">
  <form action="dashboard.php?action=insert" method="POST" autocomplete="off">
    <label>
      <span class="name">Product Name <span class="required">*</span></span>
      <input type="text" name="productname">
    </label>
    <label>
      <span class="sku">SKU <span class="required">*</span></span>
      <input type="text" name="sku">
    </label>
    <label>
      <span>Pattern <span class="required">*</span></span>
      <select name="pattern">
        <option value="select">Select a pattern...</option>
        <option value="shirt">Shirt</option>
        <option value="tshirt">T-Shirt</option>
        <option value="pant">Pant</option>
        <option value="trouser">Trouser</option>
        <option value="jacket">Jacket</option>
      </select>
    </label>
    <div class="row">
        <label><span>Size <span class="required">*</span></span></label>
        <input type="Checkbox" name="small" value="">Small
        <input type="Checkbox" name="medium" value="">Medium
        <input type="Checkbox" name="large" value="">Large
        <input type="Checkbox" name="extralarge" value="">X-Large
    </div></br>
    <label>
      <span>Quantity <span class="required">*</span></span>
      <select name="quantity">
        <option value="select">Select quantity...</option>
        <option name="quantity" value="">1</option>
        <option name="quantity" value="">2</option>
        <option name="quantity" value="">3</option>
        <option name="quantity" value="">4</option>
        <option name="quantity" value="">5</option>
      </select>
    </label>
    <label>
      <span class="shipping">Shipping<span class="required">*</span></span>
      <input type="number" value="" name="shipping">
    </label>

    <button type="submit" name="add">Submit</button>
  </form>
 </div>
</div>
</body>
</html>