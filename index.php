<?php
    require_once('includes/dbh-inc.php');
    $query = "SELECT * FROM user_list;"; 
    $result = mysqli_query($conn, $query)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h1>Header</h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <td>Author</td>
                                <td>Function</td>
                                <td>Status</td>
                                <td>Employed</td>
                            </tr>
                            <tr></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>