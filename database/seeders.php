 <?php
$servername = "localhost";
$username = "root";
$password = "alex";
$dbname = "dol";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// insert default roles into roles table
$sql = "INSERT INTO roles (roleName) VALUES ('admin'), ('user'), ('guest')";
if ($conn->query($sql) === TRUE) {
  echo "Default roles inserted successfully";
} else {
  echo "Error inserting roles: " . $conn->error;
}