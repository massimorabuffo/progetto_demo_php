<?php
    require_once('includes/dbh-inc.php');

    header('Content-Type: application/json; charset=utf-8');

    // if (isset($_POST['author']) && isset($_POST['function'])) {
    //     $author = $_POST['author'];
    //     $function = $_POST['function'];
    //     $status = $_POST['status'];
    //     $employed = $_POST['employed'];
        
    //     $postquery = "INSERT INTO `user_list` (`author`, `function`, `status`, `employed`) VALUES ('$author', '$function', '$status', '$employed')";
    //     $rs = mysqli_query($conn, $postquery);

    //     if($rs) {
    //         echo "User Inserted";
    //     }
    // }


  
    // Verifico che la richiesta sia valida
    var_dump($_POST); die();
        if (isset($_POST['author']) && isset($_POST['function']) && isset($_POST['status']) && isset($_POST['employed'])) {
            $author = $_POST['author'];
            $function = $_POST['function'];
            $status = $_POST['status'];
            $employed = $_POST['employed'];
            
            $postquery = "INSERT INTO `user_list` (`author`, `function`, `status`, `employed`) VALUES ('".addslashes($author)."', '".addslashes($function)."', '".addslashes($status)."', '".addslashes($employed)."')";
            // $rs = mysqli_query($conn, $postquery);
            $conn->query($postquery);
            
            echo json_encode([
                'status' > true,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'La richiesta non è stata formulata in modo corretto.'
            ]);
        }
    

?>