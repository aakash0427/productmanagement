<?php
require 'database.php';
$conn = new mysqli("localhost", "root", "", "productmanagement");

if(isset($_POST['update']))
{
 $id=$_GET['id'];
 $sku = $_POST['sku'];
 $quantity = $_POST['quantity'];
 
 
 $res= new Database();
 $res->editproduct('product',$id,$quantity);
if ($res == true) {
 header('location:vendorin.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EditProductForm</title>
  
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
  <div class="title">
      <h2>Edit Product Form</h2>
  </div>
<div class="d-flex">
  <form action="" method="POST" autocomplete="off">
  <?php
    $id = $_GET['id'];
    $rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product WHERE id = '$id'"));
    ?>
    <input type="hidden" id="id" value="<?php echo $rows['id'];?>">
    <label>
      <span class="name">Product Name <span class="required">*</span></span>
      <input type="text" name="productname" value="<?php echo $rows['productname'];?>" disabled>
    </label>
    <label>
      <span class="sku">SKU <span class="required">*</span></span>
      <input type="text" name="sku" value="<?php echo $rows['sku'];?>" disabled>
    </label>
    <label>
      <span>Pattern <span class="required">*</span></span>
      <select name="pattern">
        <option value="select">Select a pattern...</option>
        <option name="pattern" value="<?php echo $rows['pattern'];?>" disabled>Shirt</option>
        <option name="pattern" value="<?php echo $rows['pattern'];?>" disabled>T-Shirt</option>
        <option name="pattern" value="<?php echo $rows['pattern'];?>" disabled>Pant</option>
        <option name="pattern" value="<?php echo $rows['pattern'];?>" disabled>Trouser</option>
        <option name="pattern" value="<?php echo $rows['pattern'];?>" disabled>Jacket</option>
      </select>
    </label>
    <div class="row">
        <label><span>Size <span class="required" name="size">*</span></span></label>
        <input type="Checkbox" name="size" value="<?php echo $rows['size'];?>" disabled>Small
        <input type="Checkbox" name="size" value="<?php echo $rows['size'];?>" disabled>Medium
        <input type="Checkbox" name="size" value="<?php echo $rows['size'];?>" disabled>Large
        <input type="Checkbox" name="size" value="<?php echo $rows['size'];?>" disabled>X-Large
    </div></br>
    <label>
      <span>Quantity <span class="required">*</span></span>
      <select name="quantity" value="<?php echo $rows['quantity'];?>">
        <option value="select">Select quantity...</option>
        <option name="quantity" value="<?php echo $rows['quantity'];?>">1</option>
        <option name="quantity" value="<?php echo $rows['quantity'];?>">2</option>
        <option name="quantity" value="<?php echo $rows['quantity'];?>">3</option>
        <option name="quantity" value="<?php echo $rows['quantity'];?>">4</option>
        <option name="quantity" value="<?php echo $rows['quantity'];?>">5</option>
      </select>
    </label>
    <label>
      <span class="shipping">Shipping<span class="required">*</span></span>
      <input type="number" value="<?php echo $rows['shipping'];?>" name="shipping" disabled>
    </label>

    <button type="submit" name="update">Submit</button>
  </form>
 </div>
</div>
</body>
</html>