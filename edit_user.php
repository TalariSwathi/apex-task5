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
        echo "<script>
                alert('User Updated Successfully!');
                window.location='manage_users.php';
              </script>";
        exit();
    }
    else
    {
        echo "<script>alert('Update Failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Edit User</h2>

    <form method="POST">

        <label>Name</label>
        <input
            type="text"
            name="name"
            value="<?php echo $row['name']; ?>"
            required
        >

        <label>Email</label>
        <input
            type="email"
            name="email"
            value="<?php echo $row['email']; ?>"
            required
        >

        <label>Phone</label>
        <input
            type="text"
            name="phone"
            value="<?php echo $row['phone']; ?>"
            required
        >

        <label>Gender</label>

        <div class="gender">
            <input
                type="radio"
                name="gender"
                value="Male"
                <?php if($row['gender']=="Male") echo "checked"; ?>
            > Male

            &nbsp;&nbsp;

            <input
                type="radio"
                name="gender"
                value="Female"
                <?php if($row['gender']=="Female") echo "checked"; ?>
            > Female
        </div>

        <label>City</label>
        <input
            type="text"
            name="city"
            value="<?php echo $row['city']; ?>"
            required
        >

        <button type="submit" name="update">
            Update User
        </button>

        <br><br>

        <button
            type="button"
            onclick="window.location.href='manage_users.php'">
            Back
        </button>

    </form>

</div>

</body>
</html>