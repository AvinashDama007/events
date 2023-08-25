<!DOCTYPE html>
<html lang="en">
<?php
include('db.php');

if(!isset($_SESSION['userid'])){
    header("Location: login.php");
}
$event_id = $_GET['id'];

$qury = "SELECT * FROM `create_envent` WHERE `eventid`='$event_id' LIMIT 15";
$result = mysqli_query($conn, $qury);
$num = mysqli_num_rows($result);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Landing Page</title>
    <link rel="stylesheet" href="css/eventview.css">
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>

<body>
<script>
    if(window.history.replaceState){
      window.history.replaceState(null,null,window.location.href);
        }
  </script>
    <?php 
    if($num==1){
        $row = mysqli_fetch_assoc($result);
        $evname = $row['ename'];
        $evdate = $row['edate'];
        $evtime = $row['etime'];
        $evdetails = $row['edetails'];
        $evloc = $row['elocation'];
        $evorg = $row['eorg'];
        $evspek = $row['speaker'];
        $dutime = $row['dtime'];


    
    ?>
    <header>
        <h1><?php echo $evname;?></h1>
        <p>Date: <?php echo $evdate;?></p>
        <p>Location: <?php echo $evloc;?></p>
        <div class="home">
            <a href="home.php">
            Home
            </a>
            <a href="logout.php">
            logout
            </a>
        </div>
    </header>
   
    <main>
        <section>
            <h2>About the Event</h2>
            <p>
            <?php echo $evdetails;?>
            </p>
        
        </section>

        <section>
            <h2>Event Schedule</h2>
            <table>
                <tr>
                    <td>Event Date</td>
                    <td><?php echo $evdate;?></td>
                </tr>
                <tr>
                    <td>Event time</td>
                    <td><?php echo $evtime;?></td>
                </tr>
                <tr>
                    <td>Due time</td>
                    <td> <?php echo $dutime;?></td>
                </tr>
            </table>
        </section>

        <section>
            <h2>Featured Speakers</h2>
            <ul>
                <li>
                
                    <h3><?php echo $evspek;?></h3>
                  
                </li>
            
            </ul>
        </section>

        <section>
            <h2>Register Now!</h2>
            <p>Don't miss out on this amazing event! Register now to reserve your spot.</p>
           
            <form action="" method="post">
                <button type="submit" name="register" id="register">Register</button>
            </form>


        </section>

        <section>
            <h2>Event Location</h2>
            <p>The event will take place at:</p>
            <p><?php echo $evloc;?></p>
            <!-- Add Google Maps integration here -->
            <?php if($_SESSION['role']!="student"){
                
                echo " <form action='createevent.php'>
                <button type='submit'>create new event</button>
            </form>";
            }
                
            ?>
           
            
        </section>
    </main>

    <?php 
}

?>

    <footer>
        <p>Contact us at: info@example.com</p>
    </footer>
</body>
<?php
if(isset($_POST['register'])){
    $evstid= $event_id.$_SESSION['id'];
    $student_name = $_SESSION['username'];
    $semail=$_SESSION['userid'];
    // echo $semail."<br>";
    // echo $student_name."<br>";
    // echo $evstid."<br>";
    // echo $event_id."<br>";
    $sqlqur="INSERT INTO `registered_student`(`id`, `event_id`, `student_name`, `semail`) VALUES ('$evstid','$event_id','$student_name','$semail')";
    try{
     if(mysqli_query($conn,$sqlqur)){
        echo "<script>
        alert('you r register for' + ' $evname');
        </script>";
     }
     else{
        echo "<script>
        alert('inserstion error');
        </script>";
     }
    }
    catch(Exception $e){
        echo "<script>
        alert('Alredy Register for' + ' $evname');
        </script>";
    }
}

?>


</html>
