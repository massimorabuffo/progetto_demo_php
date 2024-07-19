<?php
    require_once('includes/dbh-inc.php');
    $_POST = json_decode(file_get_contents('php://input'), true);
    $author = $conn->real_escape_string($_POST['author']);
    $function = $conn->real_escape_string($_POST['function']);
    $status = $conn->real_escape_string($_POST['status']);
    $employed = $conn->real_escape_string($_POST['employed']);
    $id = $_POST['id'];

    $editquery = "UPDATE `user_list` SET ('author'='$author', 'function'='$function', 'status'='$status', 'employed' = '$employed') WHERE ";