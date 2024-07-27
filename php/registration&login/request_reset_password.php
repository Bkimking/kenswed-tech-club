<?php
include('../Connect/connect.php');

if (isset($_POST["email"])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $token = bin2hex(random_bytes(50)); // Generate a secure token
        $stmt->bind_result($id);
        $stmt->fetch();

        // Store the token in the database with an expiration date
        $stmt = $conn->prepare("INSERT INTO password_reset_tokens (user_id, token, expires_at) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))");
        $stmt->bind_param("is", $id, $token);
        $stmt->execute();

        $resetLink = "http://Kenswed Tech Club/php/registration&login/reset_password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the link below to reset your password: \n$resetLink";
        $headers = "From: no-reply@yourdomain.com";

        if (mail($email, $subject, $message, $headers)) {
            echo "<script>
            alert('A password reset link has been sent to your email');
            window.location.href = '../../reg&loginform/bootstrap/login.html';
            </script>";
        } else {
            echo "<script>
            alert('Failed to send email');
            window.location.href = '../../reg&loginform/bootstrap/password_reset.html';
            </script>";
        }
    } else {
        echo "<script>
        alert('Email not found');
        window.location.href = '../../reg&loginform/bootstrap/password_reset.html';
        </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>
        alert('Form not submitted correctly');
        window.location.href = '../../reg&loginform/bootstrap/password_reset.html';
        </script>";
    exit();
}
?>
