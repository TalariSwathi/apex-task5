<?php
include 'db.php';

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $sql = "UPDATE users
            SET
            name='$name',
            email='$email',
            phone='$phone',
            gender='$gender',
            city='$city'
            WHERE id=$id";

    if(mysqli_query($conn, $sql))
    {
        header("Location: manage_users.php");
        exit();
    }
    else
    {
        echo "Update Failed!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h2>Edit User</h2>

<form method="POST">

Name:<br>
<input type="text" name="name"
value="<?php echo $row['name']; ?>" required><br><br>

Email:<br>
<input type="email" name="email"
value="<?php echo $row['email']; ?>" required><br><br>

Phone:<br>
<input type="text" name="phone"
value="<?php echo $row['phone']; ?>" required><br><br>

Gender:<br>

<input type="radio" name="gender" value="Male"
<?php if($row['gender']=="Male") echo "checked"; ?>>
Male

<input type="radio" name="gender" value="Female"
<?php if($row['gender']=="Female") echo "checked"; ?>>
Female

<br><br>

City:<br>
<input type="text" name="city"
value="<?php echo $row['city']; ?>" required><br><br>

<button type="submit" name="update">
Update
</button>

</form>

</body>
</html>