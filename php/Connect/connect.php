<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kenswed_tech_club";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL to create users table
$tableuser = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NOT NULL,
    surname VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    usertype VARCHAR(50) NOT NULL DEFAULT 'user', 
    email_verified_at TIMESTAMP NULL DEFAULT NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$tableuser_result = mysqli_query($conn, $tableuser);

if ($tableuser_result === TRUE) {
    // Uncomment below if you want to see the success message
    // echo "Table users created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// SQL to create password_reset_tokens table
$pass_reset_token = "CREATE TABLE IF NOT EXISTS password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL
)";

$pass_reset_token_result = mysqli_query($conn, $pass_reset_token);

if ($pass_reset_token_result === TRUE) {
    // Uncomment below if you want to see the success message
    // echo "Table password_reset_tokens created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Uncomment and run the following code if you need to drop the tables
/*
// SQL to drop users table
$sql = "DROP TABLE IF EXISTS users";
if ($conn->query($sql) === TRUE) {
    echo "Table users dropped successfully";
} else {
    echo "Error dropping table: " . $conn->error;
}

// SQL to drop password_reset_tokens table
$sql = "DROP TABLE IF EXISTS password_reset_tokens";
if ($conn->query($sql) === TRUE) {
    echo "Table password_reset_tokens dropped successfully";
} else {
    echo "Error dropping table: " . $conn->error;
}
*/
?>
