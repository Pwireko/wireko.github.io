<?php
// Start the session
session_start();
//if user is already logged in redirect to the dashboard page
 if (isset($_SESSION['ID']) && $_SESSION['ID'] === true) {
    header("location: dashboard.html");
    exit;
}
?>