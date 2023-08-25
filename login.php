<!DOCTYPE html>
<html>
<?php
include('db.php');
if (isset($_POST['button'])) {
    

    $emailid = $_POST['email'];
    $pass = $_POST['password'];
    $qury = "SELECT * FROM `user` WHERE `email`='$emailid' AND `password`='$pass'";


    try{
        $result = mysqli_query($conn, $qury);
        $row = mysqli_fetch_assoc($result);
        $num = mysqli_num_rows($result);
        if($num>0){
            if($row['approve'] == '1'){
            $_SESSION['userid'] = $emailid;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] =$row['name'];
            $_SESSION['role'] = $row['role'];

            header("Location: home.php");
            }
            else{
                echo "<script>alert('Id is not Approved')</script>";
            }
        }
        else{
            echo "<script>alert('Usernot found Or Id is Rejected')</script>";
        }
    }
    catch(Exception $e){
echo $e;
    }

  }
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to Event</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
<script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
        }
  </script>
    <div class="container">
        <form action="login.php" method="post">
            <h2>Login to Your Account</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="button">Login</button>
            <a href="register.php">don't have an account?</a>

        </form>
        
        

    </div>
</body>

</html>
