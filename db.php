<?php

$servername = "localhost";
$username = "root";
$password = "";
$datbase = "events";

// Create connection
$conn = new mysqli($servername, $username, $password,$datbase);
session_start();
date_default_timezone_set("Asia/Calcutta");


?>