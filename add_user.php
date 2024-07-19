<?php
    require_once('includes/dbh-inc.php');

    header('Content-Type: application/json; charset=utf-8');

    // Verifico che la richiesta sia valida
    $_POST = json_decode(file_get_contents('php://input'), true);
    
        if (isset($_POST['author']) && isset($_POST['function']) && isset($_POST['status']) && isset($_POST['employed'])) {
            // Verifico se esiste già un utente con questo "author"
            $author = $conn->real_escape_string($_POST['author']);
            $result = mysqli_query($conn, "SELECT COUNT(*) as num FROM user_list WHERE author = '".$author."'");
            $row = mysqli_fetch_array($result);
            if ($row['num']) {
                echo json_encode([
                    'status' => false,
                    'message' => 'L\'autore esiste già nel database.'
                ]);
                die();
            }
            
            try {
                $author = $_POST['author'];
                $function = $_POST['function'];
                $status = $_POST['status'];
                $employed = $_POST['employed'];
                
                $postquery = "INSERT INTO `user_list` (`author`, `function`, `status`, `employed`) VALUES ('".addslashes($author)."', '".addslashes($function)."', '".addslashes($status)."', '".addslashes($employed)."')";
                // $rs = mysqli_query($conn, $postquery);
                $res = $conn->query($postquery);
                
                echo json_encode([
                    'status' => true,
                ]);
                die();
            } catch (Exception $error) {
                echo json_encode([
                    'status' => false,
                    'message' => 'Si è verificato un errore durante l\'inserimento dell\'utente nel database.'
                ]);
                die();
            }
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'La richiesta non è stata formulata in modo corretto.'
            ]);
            die();
        }
    

?>