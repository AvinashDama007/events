<!DOCTYPE html>
<html lang="en">
<?php 
include('db.php');

if(!isset($_SESSION['userid'])){
    header("Location: login.php");
}


$sql  = "SELECT * FROM `create_envent`";

$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);

// echo"<pre>";
// print_r($_SESSION['role']);
// echo"</pre>";

if($_SESSION['role'] == 'student'){
 $page= "eventview.php";
}
else{
    $page="admin.php";
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Landing Page</title>
    <link rel="stylesheet" href="css/home.css">
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
    <header>
        <h1>Welcome to Event Landing page</h1>
        <p>Explore Exciting Upcoming Events</p>
        <div class="home">
            <?php 
                if($_SESSION['role'] !="student" ){

                    
                 echo  ' <a href="createevent.php">Create Event</a>';                }
            ?>
            <a href="logout.php">logout</a>
        </div>

    </header>

    <main>
        <section class="event-list">
            <h2>Upcoming Events</h2>
            
                    <?php
                        if($num>0){
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ename =$row['ename'];
                        $date = $row['edate'];
                        $loc = $row['elocation'];
                        $evid = $row['eventid'];
                        
                        echo "
                        <ul>
                <li>
                <a href='$page?id=$evid'>
                        <div>
                        <h3> $ename </h3>
                        <p>Date: $date</p>
                        <p>Location: $loc</p>
                        </div>
                    </a>
                    </li>
            </ul>";
                    }
                }
                    
                    ?>
                
                <?php if($_SESSION['role']!="student"){
                
                   echo " <form action='createevent.php'>
                    <button type='submit'>create new event</button>
                        </form>";
            }  
            ?>
        </section>
    </main>

    <footer>
        <p>Contact us at: info@example.com</p>
    </footer>
</body>

</html>
