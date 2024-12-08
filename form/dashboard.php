<?php
session_start();
include 'navbar1.php';
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

echo "Welcome to your dashboard!";
echo "<a href='logout.php'>Logout</a>";
?>
