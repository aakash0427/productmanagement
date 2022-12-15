<?php
class Database{
  public $db_host = "localhost";
  public $db_user = "root";
  public $db_pass = "";
  public $db_name = "productmanagement";
  public $conn;

  public function __construct(){
  $this->conn = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
  }

  public function insert($table,$para=array()){
  $table_columns = implode(',', array_keys($para));
  $table_value = implode("','", $para);
  $sql="INSERT INTO $table($table_columns) VALUES('$table_value')";
  $result = $this->conn->query($sql);
  }

  public function edit($table,$id,$productname,$sku,$pattern,$size,$quantity,$shipping)
  {
  $res = mysqli_query($this->conn,"UPDATE $table SET id='$id',productname='$productname', sku='$sku',pattern='$pattern',size='$size', quantity='$quantity',shipping='$shipping' WHERE id='$id'");
  return $res;
  }

  public function editvendor($table,$id,$fname,$lname,$gender,$email,$contact)
  {
  $res = mysqli_query($this->conn,"UPDATE $table SET id='$id',fname='$fname', lname='$lname',gender='$gender',email='$email', contact='$contact' WHERE id='$id'");
  return $res;
  }

  public function editproduct($table,$id,$sku,$quantity)
  {
  $res = mysqli_query($this->conn,"UPDATE $table SET id='$id',quantity='$quantity' WHERE id='$id'");
  return $res;
  }
}

class Login extends Database{
  public $id;
  public function login($email, $password, $type){
  $sql= "SELECT * FROM admins WHERE email='$email' AND password='$password' AND type='$type'";
  $query= mysqli_query($this->conn, $sql);

  if(mysqli_num_rows($query)==1 && $type==1)
  {
    header("location:dashboard.php");
  }
  elseif(mysqli_num_rows($query)==1 && $type==0)
  {
    header("location:vendorin.php");
  }
  else
  {
    header("login.php");
  }
  }

  public function idUser(){
    return $this->id;
  }
}


class Register extends Database{
  public function registration($fname, $lname, $gender, $email, $contact, $password , $confirmpassword){
    $duplicate = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '$email'");
    if(mysqli_num_rows($duplicate) > 0){
      return 10;
      // Username has already taken
    }
    else{
      if($password == $confirmpassword){
        $query1 = "INSERT INTO admins (`email`, `password`, `type`) VALUES('$email','$password',0)";
        $result = mysqli_query($this->conn,$query1);
        $query = "INSERT INTO users VALUES('','$fname', '$lname', '$gender', '$email', '$contact', '$password')";
        mysqli_query($this->conn, $query);
        return 1;
        // Registration successful
      }
      else{
        return 100;
        // Password does not match
      }
    }
  }
}

class Select extends Database{
  public function selectUserById($id){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE id = $id");
    return mysqli_fetch_assoc($result);
  }
}
?>