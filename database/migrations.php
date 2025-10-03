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

// create method to create table if not exists
function createTableIfNotExists($conn) {
    $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
      echo "Table users created successfully or already exists.<br>";
    } else {
      echo "Error creating table: " . $conn->error;
    }
}

// method to insert sample data
function insertSampleData($conn) {
    $sql = "INSERT INTO users (firstname, lastname, email) VALUES
    ('John', 'Doe', 'john.doe@example.com'),
    ('Jane', 'Smith', 'jane.smith@example.com')";

  if ($conn->query($sql) === TRUE) {
    echo "New records created successfully.<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// method to select and display data
function displayData($conn) {
    $sql = "SELECT id, firstname, lastname, email FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Email: " . $row["email"]. "<br>";
      }
    } else {
      echo "0 results<br>";
    }
}

// method to close connection
function closeConnection($conn) {
    $conn->close();
    echo "Connection closed.<br>";
}