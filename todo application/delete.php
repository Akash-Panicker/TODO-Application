<?php error_reporting(0);
$name = $_POST['name'];
$content = $_POST['content'];
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "todoapp";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if (isset($_GET['id'])) {
  $id = base64_decode($_GET['id']);
  $delete = "DELETE FROM todo WHERE id=$id";
  $delete;
  $run = $conn->query($delete);
  
header('location: alltodos.php');
}

?>