<!DOCTYPE html>

<html lang="en">
<?php
include('db.php');
// echo  date("Y-m-d H:i:s");



if (!isset($_SESSION['userid']) ||$_SESSION['role']=="student" ) {
  header("Location: logout.php");
}

if (isset($_POST['create_evn'])) {


  $ename = $_POST["eventName"];
  $edate = $_POST["eventDate"];
  $etime = $_POST["eventTime"];
  $edetails = $_POST['eventDetails'];
  $elocation = $_POST['eventLocation'];
  $eorg = $_POST['organizer'];
  $speaker = $_POST['speaker'];
  $dtime = $_POST['dueTime'];


  $sqlqur = "INSERT INTO `create_envent`(`ename`, `edate`, `etime`, `edetails`, `elocation`, `eorg`, `speaker` , `dtime`) VALUES ('$ename','$edate','$etime','$edetails','$elocation','$eorg','$speaker','$dtime')";

  try {
    if (mysqli_query($conn, $sqlqur)) {
      echo "<script>alert('event craeted')</script>";
    } else {
      echo "<script>alert('something went wrong!')</script>";
    }
  } catch (Exception $e) {
    echo "<script>alert('something went wrong!')</script>";

  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>

  </style>
  <title>Create Event</title>
  <link rel="stylesheet" href="css/createevent.css">

</head>

<body>


  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <header class="home">
  <h1>Create Event</h1>
  <div class="btndiv">
            <a href="home.php">
            Home
            </a>
            <a href="logout.php">
            logout
            </a>
        </div>
  </header>
  <div class="container">
    <div class="create-event-form">

     
      <form method="post">
        <div class="form-group">
          <label for="eventName">Event Name</label>
          <input type="text" id="eventName" name="eventName" required>
        </div>
        <div class="form-group">
          <label for="eventDate">Event Date</label>

          <input type="date" id="eventDate" name="eventDate" min="<?php echo  date("Y-m-d");?>">
        </div>
        <div class="form-group">
          <label for="eventTime">Event Time</label>
          <input type="time" id="eventTime" name="eventTime">
        </div>
        <div class="form-group">
          <label for="dueTime">Due Time</label>
          <input type="time" id="dueTime" name="dueTime">
        </div>
        <div class="form-group">
          <label for="eventDetails">Event Details</label>
          <textarea id="eventDetails" name="eventDetails" rows="4"></textarea>
        </div>
        <div class="form-group">
          <label for="eventLocation">Event Location</label>
          <input type="text" id="eventLocation" name="eventLocation">
        </div>
        <div class="form-group">
          <label for="organizer">Event Organized By</label>
          <input type="text" id="organizer" name="organizer">
        </div>
        <div class="form-group">
          <label for="speaker">Speaker</label>
          <input type="text" id="speaker" name="speaker">
        </div>
        <div class="form-group">
          <input type="submit" name="create_evn" value="Create Event">
        </div>
        <div class="form-group">
          <input type="reset" name="rset" value="Reset">
        </div>
      </form>
    </div>
  </div>
</body>

</html>