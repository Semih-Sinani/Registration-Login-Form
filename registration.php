<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
    <title>Registration</title>
  </head>
  <body id="bodd">
    <h2 id="reg">Registration</h2>
    <div class="regstyle">
      <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id = "name" required value=""> <br>
        <label for="username">Username : </label>
        <input type="text" name="username" id = "username" required value=""> <br>
        <label for="email">Email : </label>
        <input type="email" name="email" id = "email" required value=""> <br>
        <label for="password">Password : </label>
        <input type="password" name="password" id = "password" required value=""> <br>
        <label for="confirmpassword">Confirm Password : </label> <br>
        <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br> <br>
        <button type="submit" name="submit" id="butt">Register</button>
      </form>
      <br>
    </div>
    <a href="login.php" id="reg">Login</a>
  </body>
</html>