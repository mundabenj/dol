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

// drop table if exists
$sql = "DROP TABLE IF EXISTS MyGuests";
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests dropped successfully";
} else {
  echo "Error dropping table: " . $conn->error;
}

// sql to create table
$sql = "CREATE TABLE if not exists MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// drop event table if exists
$sql = "DROP TABLE IF EXISTS events";
if ($conn->query($sql) === TRUE) {
  echo "Table events dropped successfully";
} else {
  echo "Error dropping table: " . $conn->error;
}

// create event table
$sql = "CREATE TABLE events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
description TEXT,
start DATETIME NOT NULL,
end DATETIME NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Execute query and check for errors
if ($conn->query($sql) === TRUE) {
  echo "Table events created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// drop roles table if exists
$sql = "DROP TABLE IF EXISTS roles";
if ($conn->query($sql) === TRUE) {
  echo "Table roles dropped successfully";
} else {
  echo "Error dropping table: " . $conn->error;
}

// create roles table
$sql = "CREATE TABLE roles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
roleName VARCHAR(30) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table roles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?> 