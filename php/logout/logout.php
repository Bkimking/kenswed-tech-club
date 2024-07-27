<?php

session_start();

if (session_destroy()){
    echo "<script>
            alert('Logged out!');
            window.location.href = '../../reg&loginform/bootstrap/login.html';
        </script>";
}

?>