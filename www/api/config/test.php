 <?php
$servername = "db";
$username = "devuser";
$password = "devpass";
$db = "phoenix";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?> 
