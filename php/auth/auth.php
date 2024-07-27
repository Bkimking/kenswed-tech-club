<?php

function isLoggedIn()
{
    return
        isset($_SESSION['user_id']) ||
        isset($_SESSION['email']) ||
        isset($_SESSION['username']) ||
        isset($_SESSION['usertype']);
}

function isAdmin()
{
    return isLoggedIn() && $_SESSION['usertype'] === 'admin';
}

function isSuperAdmin()
{
    return isLoggedIn() && $_SESSION['usertype'] === 'super_admin';
}

function isUser()
{
    return isLoggedIn() && $_SESSION['usertype'] === 'user';
}

?>