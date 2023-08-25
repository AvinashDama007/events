<!DOCTYPE html>
<?php
include "db.php";
if ($_SESSION['role'] != 'admin') {
    header("Location: home.php");
}

$sqlqury = "SELECT * FROM `user` WHERE approve=0;";
$result = mysqli_query($conn,$sqlqury);
$num = mysqli_num_rows($result);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
<script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <header>
        <h1>Registered Users</h1>
        <div class="admin-links">
            <a href="home.php">Home</a>
            <a href="">Users</a>
            <a href="createevent.php">Create Event</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>


<main>
    <section class="user-list">
        <div class="user-info">
            <table>
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Approve</th>
                        <th>Disapprove</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      if($num==0){
                        echo "<tr><td colspan='6'><h1>No Requst Pending</h1></td></tr>";
                        }
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                       
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['role'];?></td>
                        <form action="" method="post">
                            <input type="hidden" value="<?php echo $row['id'];?>" name="user_id">
                            <td><button type="submit" name="approve" value="1">Approve</button></td>
                            <td><button type="submit" name="reject" value="0">Reject</button></td>
                        </form>

                    </tr>
                    <?php
                }
              
                ?>
                
                </tbody>
            </table>
        </div>
    </section>
    </main>
</body>
<?php 

if(isset($_POST['approve'])){
   $approve = 1;
    echo "<script>alert('User Approved');</script>";
}
else if(isset($_POST['reject'])){
    $approve = 2;
    echo "<script>alert('User Rejected');</script>";
}

if(isset($_POST['approve']) || isset($_POST['reject'])){
    $user_id = $_POST['user_id'];
    $sql1 = "UPDATE `user` SET `approve`='$approve' WHERE id ='$user_id';";

    try{
    $result1 = mysqli_query($conn,$sql1);
        header("refresh:0");
    }
    catch(Exception $e){
        echo "<script>alert('Something went Wrong'+'$e');</script>";
    }
    
}


?>

</html>