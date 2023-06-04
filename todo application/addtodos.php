<?php error_reporting(0);
$name = $_POST['name'];
$content = $_POST['content'];
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "todoapp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// if form is submitted only then enter if condition
if (isset($_POST['adding'])) {
    $sql = $conn->prepare("insert into todo(name,content) values(?,?)");
    $sql->bind_param("ss", $name, $content);
    $sql->execute();
    echo "Added Succesfully ";
    $sql->close();
    $conn->close();
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
        <h3>Add TODOS</h3>
    </div>
    <hr>
    <form class="container" method="post" action="">
        Name: <input type="text" name="name"><br><br>
        Content: <br>
        <textarea name="content" rows="4" cols="50" class="form-control"></textarea><br><br>
        <input type="submit" class="btn btn-warning" name="adding" value="Add">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>