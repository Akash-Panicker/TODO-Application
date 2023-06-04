<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "todoapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Fetch data from table 
$sql = "SELECT * FROM todo";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>TODO Application</title>
    <style>
        body {
            background-color: #85FFBD;
            background-image: linear-gradient(90deg, #85FFBD 0%, #FFFB7D 100%);
        }
    </style>
</head>


<body>
    <div class="container">
        <h1 class="text-center">
            <a href="index.html" style="text-decoration: none; color: inherit;">
                My TODO App
            </a>
        </h1>
        <hr>
    </div>
    <style>
        .button-container {
            margin-bottom: 20px;
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center button-container">
            <div class="col-md-4 col-lg-2 mb-3">
                <a class="btn btn-primary btn-block" href="alltodos.php" role="button">View All Todos</a>
            </div>
            <div class="col-md-4 col-lg-2 mb-3">
                <a class="btn btn-primary btn-block" href="addtodos.php" role="button">Add A TODO</a>
            </div>
            <div class="col-md-4 col-lg-2 mb-3">
                <a class="btn btn-primary btn-block" href="removetodos.php" role="button">Remove A TODO</a>
            </div>
            <div class="col-md-4 col-lg-2 mb-3">
                <a class="btn btn-primary btn-block" href="searchtodo.php" role="button">Search TODO</a>
            </div>
        </div>
    </div>

    <div class="container" style=" overflow-x: hidden">
        <h3> ALL TODOS</h3>
    </div>
    <hr>
    <table class=" container table table-info">
        <thead>
            <tr>
                <th scope="col">Todo ID</th>
                <th scope="col">Name</th>
                <th scope="col">Content</th>
                <th scope="col">Date and Time Added</th>
                <th scope="col">Checklist</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Display the  data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["content"] . "</td>";
                    echo "<td>" . $row["DateTime"] . "</td>";
                    echo "<td> <a class='btn btn-sm btn-success' href='delete.php?id=" . base64_encode($row['id']) . "'>Done &#10003</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
