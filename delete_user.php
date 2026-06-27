<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if(mysqli_query($conn, $sql))
{
    header("Location: manage_users.php");
    exit();
}
else
{
    echo "Delete Failed!";
}
?>