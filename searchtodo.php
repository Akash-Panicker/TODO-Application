<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "todoapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    // Fetch the details from the table based on the name
    $query = "SELECT * FROM your_table_name WHERE name = '$name'";
    $result = mysqli_query($conn, $query);
}
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
    <div class="container ">
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

    <div class="container">
        <h3>Fetch Details</h3>
        <hr>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <form class="text-center" method="POST" action="">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-info" name="submit" value="Fetch">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <hr>
        <h3>View TODO</h3>
    </div>
    <hr class="container">
    <?php
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $query = "SELECT * FROM todo WHERE name = '$name'";
        $result = mysqli_query($conn, $query);

        // Check if the query was executed properly
        if ($result) {
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                echo '<table class="container table table-info">';
                echo '<thead>
                    <tr>
                        <th scope="col">Todo ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date and Time Added</th>
                    </tr>
                  </thead>';
                echo '<tbody>';
                // Display all rows returned
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["content"] . "</td>";
                    echo "<td>" . $row["DateTime"] . "</td>";
                    echo "</tr>";
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo "<p>No records found for the given name.</p>";
            }
        } else {
            echo "<p>Error executing the query: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>