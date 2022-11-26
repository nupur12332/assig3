<?php

class database{
  private $servername = "172.31.22.43";
  private $username   = "Nupur200512816";
  private $password   = "RCMCFo1sKc";
  private $database   = "Nupur200512816";
  public  $con;


  // Database Connection
  public function __construct()
  {
    $this->con = new mysqli($this->servername, $this->username,$this->password,$this->database);
    if(mysqli_connect_error()) {
      trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
    }else{
      return $this->con;
    }
  }

  // Insert customer data into customer table
  public function insertData($post)
  {
    $fname = $this->con->real_escape_string($_POST['fname']);
    $lname = $this->con->real_escape_string($_POST['lname']);
    $email = $this->con->real_escape_string($_POST['email']);
    $password = $this->con->real_escape_string($_POST['password']);
      $cpassword = $this->con->real_escape_string($_POST['cpassword']);
    $query="INSERT INTO customers(fname,lname,email,password,cpassword) VALUES('$fname','$lname','$email','$password','$cpassword')";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg1=insert");
    }else{
      echo "Registration failed try again!";
    }
  }
  public function displayData()
  {
    $query = "SELECT * FROM customers";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }else{
      echo "Records not found";
    }
  }

  public function displyaRecordById($id)
  {
    $query = "SELECT * FROM customers WHERE id = '$id'";
    $result = $this->con->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    }else{
      echo "Record not found";
    }
  }

  public function updateRecord($postData)
  {
    $fname = $this->con->real_escape_string($_POST['ufname']);
    $lname = $this->con->real_escape_string($_POST['ulname']);
    $email = $this->con->real_escape_string($_POST['uemail']);
    $password = $this->con->real_escape_string($_POST['upassword']);
      $cpassword = $this->con->real_escape_string($_POST['ucpassword']);
    $id = $this->con->real_escape_string($_POST['id']);
    if (!empty($id) && !empty($postData)) {
      $query = "UPDATE customers SET fname = '$fname',lname = '$lname', email = '$email', password = '$password', cpassword = '$cpassword' WHERE id = '$id'";
      $sql = $this->con->query($query);
      if ($sql==true) {
        header("Location:index.php?msg2=update");
      }else{
        echo "Update failed... try again!";
      }
    }

  }

  public function deleteRecord($id)
  {
    $query = "DELETE FROM customers WHERE id = '$id'";
    $sql = $this->con->query($query);
    if ($sql==true) {
      header("Location:index.php?msg3=delete");
    }else{
      echo "Record does not delete try again";
    }
  }
}
