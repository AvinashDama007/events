<!DOCTYPE html>
<html lang="en">


<?php
include('db.php');

if(isset($_POST['register'])){


  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  
  $role = $_POST['role'];

  $sqlqur = "INSERT INTO `user`(`name`, `email`, `password`,`role`) VALUES ('$name','$email','$pass','$role')";

  try{
  if (mysqli_query($conn, $sqlqur)) {
    echo "<script>alert('registation done')</script>";
  }
  else{
    echo "<script>alert('something went wrong!')</script>";
  }
}
catch(Exception $e){
  echo "<script>alert('email id alredy register')</script>";
}
}


?>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .registration-form {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    padding: 60px;
    width: 300px;
  }

  .registration-form h1 {
    text-align: center;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 15px;
  }

  .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }

  .form-group input {
    width: 100%;
    padding: 8px;
    font-size: 18px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  .form-group input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
  }

  .registration-form a{

    color: black;
    padding: 0.7rem 1rem;
    display: flex;
    width: 100%;
    justify-content: center;
    margin: auto;
    padding: 15px;
    cursor: pointer;

  }
.form-group select{
  width: 100%;
  font-size: 18px;
    height: 38px;
}


</style>
<title>Registration Page</title>
</head>
<body>
  <script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
        }
  </script>
  <div class="registration-form">
    <h1>Registration</h1>
    <form method="post">
      <div class="form-group">
        <label for="role">Role</label>
        <select name="role" id="role">
          <option id="hod" value="hod">Hod</option>
          <option id="faculty" value="faculty">Faculty</option>
          <option id="student" value="student">Student</option>


        </select>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>
     
      <div class="form-group">
        <input type="submit" name='register' value="Register">
      </div>
    </form>
    <a href="login.php">alredy have account?</a>
  </div>
</body>
</html>
