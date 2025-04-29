<?php
// database_handling.php
function connect_db() {
    $host = 'localhost:3307';
    $db = 'restaurant_db';
    $user = 'root'; // Change if you created another user
    $pass = ''; // Enter password if set
    
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
?>