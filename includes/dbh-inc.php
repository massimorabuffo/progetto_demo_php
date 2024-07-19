<?php


// $dsn = "mysql:host=localhost;dbname=dashboard";

$dbname = "dashboard";
$dbusername = "root";
$dbpassword = "";
$conn = mysqli_connect("localhost", $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }