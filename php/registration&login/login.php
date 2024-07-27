<?php
session_start();
include('../Connect/connect.php');

if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, email, username, password, usertype FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $email_db, $username, $hashed_password, $usertype);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['email'] = $email_db;
            $_SESSION['username'] = $username;
            $_SESSION['usertype'] = $usertype;

            if (isset($_SESSION['usertype'])) {
                $usertype = $_SESSION['usertype'];

                if ($usertype === 'user') {
                    header("Location: ../Dashboard/User/dashboard/dashboard.php");
                    exit();
                } elseif ($usertype === 'admin') {
                    header("Location: ../Dashboard/Admin/dashboard/dashboard.php");
                    exit();
                } elseif ($usertype === 'super_admin') {
                    header("Location: ../Dashboard/Super_Admin/dashboard/dashboard.php");
                    exit();
                } else {
                    echo "Unknown user type";
                    exit();
                }
            }
        } else {
            echo "<script>
            alert('Incorrect password');
            window.location.href = '../../reg&loginform/bootstrap/login.html';
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
        window.location.href = '../../reg&loginform/bootstrap/login.html';
        </script>";        
        exit();
}
