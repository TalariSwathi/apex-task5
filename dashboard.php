<?php
session_start();

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Welcome to User Management System</h2>

    <p style="text-align:center;">
        Hello, <strong><?php echo $_SESSION['user']; ?></strong>
    </p>

    <p style="text-align:center; margin-top:10px;">
        You have successfully logged in. Use the options below to manage the application.
    </p>

    <br>

    <button onclick="window.location.href='manage_users.php'">
        👥 Manage Users
    </button>

    <br><br>

    <button onclick="window.location.href='register.php'">
        ➕ Register New User
    </button>

    <br><br>

    <button onclick="window.location.href='logout.php'">
        🚪 Logout
    </button>

</div>

</body>
</html>