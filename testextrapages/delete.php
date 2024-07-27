<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // Perform deletion logic here based on $_GET['id']
    $postId = $_GET['id'];

    // Example: Delete post from database
    // $deleted = deletePostFromDatabase($postId);

    // For demonstration, set session message
    $_SESSION['Message'] = 'Post deleted successfully!';

    // Redirect back to index.php or showposts.php
    header('Location: index.php');
    exit();
}
?>
