<?php
include('../Connect/connect.php');

if (isset($_GET['token']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    $token = $_GET['token'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "<script>
        alert('New password and confirm password do not match');
        window.location.href = 'reset_password.php?token=$token';
        </script>";
        exit();
    }

    $stmt = $conn->prepare("SELECT user_id FROM password_resets WHERE token = ? AND expires_at > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id);
        $stmt->fetch();

        $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update_stmt->bind_param("si", $new_hashed_password, $user_id);

        if ($update_stmt->execute()) {
            // Delete the used token
            $delete_stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
            $delete_stmt->bind_param("s", $token);
            $delete_stmt->execute();

            echo "<script>
            alert('Password reset successfully');
            window.location.href = '../../reg&loginform/bootstrap/login.html';
            </script>";
            exit();
        } else {
            echo "<script>
            alert('Error updating password');
            window.location.href = 'reset_password.php?token=$token';
            </script>";
            exit();
        }
    } else {
        echo "<script>
        alert('Invalid or expired token');
        window.location.href = '../../reg&loginform/bootstrap/password_reset.html';
        </script>";
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
