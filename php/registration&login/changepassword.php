<?php
session_start();
include('../Connect/connect.php');

if (isset($_POST["current_password"]) && isset($_POST["new_password"]) && isset($_POST["confirm_password"])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        echo "<script>
        alert('New password and confirm password do not match');
        window.location.href = '../../reg&loginform/bootstrap/change_password.html';
        </script>";
        exit();
    }

    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($current_password, $hashed_password)) {
            $new_hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
            $update_stmt->bind_param("si", $new_hashed_password, $user_id);
            if ($update_stmt->execute()) {
                echo "<script>
                alert('Password changed successfully');
                window.location.href = '../../reg&loginform/bootstrap/login.html';
                </script>";
                exit();
            } else {
                echo "<script>
                alert('Error updating password');
                window.location.href = '../../reg&loginform/bootstrap/change_password.html';
                </script>";
                exit();
            }
        } else {
            echo "<script>
            alert('Incorrect current password');
            window.location.href = '../../reg&loginform/bootstrap/change_password.html';
            </script>";
            exit();
        }
    } else {
        echo "<script>
        alert('User not found');
        window.location.href = '../../reg&loginform/bootstrap/login.html';
        </script>";
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<script>
        alert('Form not submitted correctly');
        window.location.href = '../../reg&loginform/bootstrap/change_password.html';
        </script>";
        exit();
}
?>
