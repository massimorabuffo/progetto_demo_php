<?php


// $dsn = "mysql:host=localhost;dbname=dashboard";

$dbname = "dashboard";
$dbusername = "root";
$dbpassword = "";

$conn = mysqli_connect("localhost", $dbusername, $dbpassword, $dbname);


// try{
//     // $pdo = new PDO($dsn, $dbusername, $dbpassword);
//     // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // $stmt = $pdo->prepare($query); 
//     // // EXECUTING THE QUERY 
//     // $stmt->execute(); 

//     // $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
//     // // FETCHING DATA FROM DATABASE 
//     // $result = $stmt->fetchAll(); 
//     // OUTPUT DATA OF EACH ROW 
//     // foreach ($result as $row)  
//     // { 
//     //     echo "Author: " . $row["author"] . " Function: " .  
//     //         $row["function"]. " Status: " . $row["status"] . 
//     //         " Employed: " . $row["employed"] . "<br>"; 

//     // } 
    

// } catch(PDOException $e) {
//     echo "Connection failed: " . $e->getMessage;
// }