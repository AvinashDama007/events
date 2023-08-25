<!DOCTYPE html>
<?php
include "db.php";
if ($_SESSION['role'] == 'student') {
    header("Location: logout.php");
}
if (!isset($_GET['id'])) {
    header("Location: home.php");

}
$event_id = $_GET['id'];

$qury = "SELECT * FROM `create_envent` WHERE `eventid`='$event_id'";
$result = mysqli_query($conn, $qury);
$num = mysqli_num_rows($result);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <header>
        <h1>Admin Page</h1>
        <div class="admin-links">
            <a href="home.php">Home</a>
            <a href="users.php">Users</a>
            <a href="createevent.php">Create Event</a>
            <a href="logout.php">Logout</a>
        </div>
    </header>

    <main>
        <section class="event-info">

            <div class="event-deatil">
                <?php if ($num == 1) {
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
                    <h2>Event Details</h2>
                    <P>Event Name :
                        <?php echo $evname ?>
                    </P>
                    <p>Event date :
                        <?php echo $evdate ?>
                    </p>
                    <p>Event timing :
                        <?php echo $evtime . ' to ' . $dutime; ?>

                    </p>
                    <p>Event details :
                        <?php echo $evdetails ?>
                    </p>
                    <P>Event Location :
                        <?php echo $evloc ?>
                    </P>
                    <p>Event speker :
                        <?php echo $evspek ?>
                    </p>
                    <p>Event Orgainzation:
                        <?php echo $evorg ?>

                    </p>
                    <?php

                }
                ?>
            </div>
        </section>
        <section class="user-list">
            <h2>Registered Users</h2>

            <table>
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Student Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stdsql = "SELECT * FROM `registered_student` WHERE event_id = '$event_id'";
                    $stdresult = mysqli_query($conn, $stdsql);
                    // $num1 = mysqli_num_rows($stdresult);
                    $num1=0;

                    while ($row1 = mysqli_fetch_assoc($stdresult)) {
                        $num1++;
                        ?>
                        <tr>
                            <td><?php echo $num1;?></td>
                            <td><?php echo $row1['student_name']; ?></td>
                            <td><?php echo $row1['semail'];?></td>
                        </tr>
                    <?php

                    }
                    ?>

                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>Contact us at: info@example.com</p>
    </footer>
</body>


</html>