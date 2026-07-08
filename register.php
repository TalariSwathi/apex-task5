<?php
include 'db.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users(name,email,password,phone,gender,city)
            VALUES('$name','$email','$password','$phone','$gender','$city')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Registration Successful!');</script>";
    }
    else
    {
        echo "<script>alert('Registration Failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>User Registration</h2>

    <form method="POST">

        <label>Name</label>
        <input type="text" name="name" placeholder="Enter your name" required>

        <label>Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>

        <label>Phone</label>
        <input type="text" name="phone" placeholder="Enter your phone number" required>

        <label>Gender</label>

        <div class="gender">
            <input type="radio" name="gender" value="Male" required> Male
            &nbsp;&nbsp;
            <input type="radio" name="gender" value="Female"> Female
        </div>

        <label>City</label>
        <input type="text" name="city" placeholder="Enter your city" required>

        <button type="submit" name="register">
            Register
        </button>

    </form>

    <p>
        Already have an account?
        <a href="login.php">Login Here</a>
    </p>

</div>

</body>
</html>