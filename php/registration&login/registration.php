<?php
//calling the connection for db
include('../Connect/connect.php');

// Check if form is submitted
if (isset($_POST["submit"])) {
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Prepare an SQL statement
    $stmt = $conn->prepare("INSERT INTO users (firstname, surname, username, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstname, $surname, $username, $email, $password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
            alert('Records inserted Successfully!');
            window.location.href = '../../reg&loginform/bootstrap/login.html';
        </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
