<?php
    require_once('includes/dbh-inc.php');
    $query = "SELECT * FROM user_list ORDER BY id DESC;"; 
    $result = mysqli_query($conn, $query);
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
                        <h1>User's table</h1>
                        <div class="text-right"><button id="add-user-button" onclick="toggleForm()">Add User</button></div>
                        <div id="form" style="display: none">
                                <label for="author">Author: </label>
                                <input class="form-control" type="text" id="author">
                                <label for="function">Function: </label>
                                <input class="form-control" type="text" id="function">
                                <label for="status">Status: </label>
                                <input class="form-control" type="text" id="status">
                                <label for="employed">Employed: </label>
                                <input class="form-control" type="text" id="employed">
                                <br>
                                <button class="btn btn-primary" onclick="addUser()">Submit</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Author</td>
                                    <th scope="col">Function</td>
                                    <th scope="col">Status</td>
                                    <th scope="col">Employed</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>
                                        <td>$row[author]</td>
                                        <td>$row[function]</td>
                                        <td>$row[status]</td>
                                        <td>$row[employed]</td>
                                        </tr>";
                            }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const toggleForm = () => {
            const form = document.getElementById("form");
            const addUserButton = document.getElementById("add-user-button");
            if(form.style.display === "none"){
                form.style.display = "block";
                addUserButton.innerHTML = "Close";
            } else {
                form.style.display = "none";
                addUserButton.innerHTML = "Add user";
            }
        }

        const addUser = async () => {

            event.preventDefault();

            const author = document.getElementById("author").value;
            const function1 = document.getElementById("function").value;
            const status = document.getElementById("status").value;
            const employed = document.getElementById("employed").value;

            if (author === '' || author === null) {
                alert("Compila il campo 'author'");
                
                return false;
            }
            if (function1 === '' || function1 === null) {
                alert("Compila il campo 'function'");

                return false;
            }
            if (status === '' || status === null) {
                alert("Compila il campo 'status'");

                return false;
            }
            if (employed === '' || employed === null) {

                alert("Compila il campo 'employed'");

                return false;
            }

            const dataObject = {author: author, function: function1, status: status, employed: employed};
    

            try {
                    const request1 = await fetch("http://localhost/progetto_demo_php/add_user.php", {
                        method: "POST",
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(dataObject),
                    });
                    const jsonResponse = await request1;
                    if (jsonResponse.status) {
                        alert("User registered.");

                    } else {
                        alert(jsonResponse.message);
                    }                                         
                }catch(error){
                    console.error(error);
                }
        }
    </script>
</body>
</html>