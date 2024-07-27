<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image'];

    // You can add code here to save the post data to the database
    // and handle the file upload if necessary.

    // For demonstration, we will just set a session message
    $_SESSION['Message'] = 'Post added successfully!';
    header('Location: index.php');
    exit();
}
?>
