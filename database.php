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
}

class Login extends Database{
  public $id;
  public function login($email, $password){
    $result = mysqli_query($this->conn, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
      if($password == $row["password"]){
        $this->id = $row["id"];
        return 1;
        // Login successful
      }
      else{
        return 10;
        // Wrong password
      }
    }
    else{
      return 100;
      // User not registered
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
?>