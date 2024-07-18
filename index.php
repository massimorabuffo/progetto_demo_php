<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php

        $dsn = "mysql:host=localhost;dbname=dashboard";
        $dbusername = "root";
        $dbpassword = "";
        $query = "SELECT * FROM user_list;"; 

        try{
            $pdo = new PDO($dsn, $dbusername, $dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare($query); 
            // EXECUTING THE QUERY 
            $stmt->execute(); 
        
            $r = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
            // FETCHING DATA FROM DATABASE 
            $result = $stmt->fetchAll(); 
            // OUTPUT DATA OF EACH ROW 
            foreach ($result as $row)  
            { 
                echo "Author: " . $row["author"]. " - Function: " .  
                    $row["function"]. "Status: " . $row["status"]. 
                    "Employed: " . $row["employed"] . "<br>"; 
            } 

        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage;
        }

        
    ?> 

</body>
</html>