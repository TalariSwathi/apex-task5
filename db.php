<?php

$conn = mysqli_connect("localhost", "root", "", "user_auth_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



?>