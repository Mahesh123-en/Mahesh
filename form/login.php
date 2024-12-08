<?php
include 'navbar1.php';
session_start();
$conn = new mysqli('localhost', 'root', '', 'infor');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user
    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // if (password_verify($password, $user['password'])) {
            // Set session and redirect
            if (($password== $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No account found with this email. <a href='register.php'>Register here</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<style>
        .form-container {
            margin: auto;
            margin-top: 100px; /* Adjust vertical centering */
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
        }
    </style>
<body>
<div class="container mt-5"> 
<div class="div-container">
<div class="form-container">
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Password:</label>
        <input type="password" name="password" required><br>
        <button  href='index.php' class='btn btn-primary btn-sm'>login</button> 
    </div>
    
</form>
</div>
</div>
</body>
</html>
