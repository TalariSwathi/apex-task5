<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user']))
{
    header("Location: login.php");
    exit();
}

$email = $_SESSION['email'];

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $image = $user['image'];

    if(isset($_FILES['image']) && $_FILES['image']['name'] != "")
    {
        $image = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "uploads/" . $image
        );
    }

    $sql = "UPDATE users
            SET
            name='$name',
            phone='$phone',
            gender='$gender',
            city='$city',
            image='$image'
            WHERE email='$email'";

    if(mysqli_query($conn, $sql))
    {
        $_SESSION['user'] = $name;

        echo "<script>
                alert('Profile Updated Successfully');
                window.location='profile.php';
              </script>";
        exit();
    }
    else
    {
        $message = "Update Failed!";
    }
}

$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>My Profile</h2>

    <?php
    if($message != "")
    {
        echo "<p style='color:red; text-align:center;'>$message</p>";
    }
    ?>

    <div style="text-align:center; margin-bottom:20px;">

        <img
            src="uploads/<?php echo $user['image']; ?>"
            width="150"
            height="150"
            style="border-radius:50%; border:3px solid #007BFF; object-fit:cover;">

    </div>

    <form method="POST" enctype="multipart/form-data">

        <label>Name</label>
        <input
            type="text"
            name="name"
            value="<?php echo $user['name']; ?>"
            required
        >

        <label>Email</label>
        <input
            type="email"
            value="<?php echo $user['email']; ?>"
            readonly
        >

        <label>Phone</label>
        <input
            type="text"
            name="phone"
            value="<?php echo $user['phone']; ?>"
            required
        >

        <label>Gender</label>

        <div class="gender">

            <input
                type="radio"
                name="gender"
                value="Male"
                <?php if($user['gender']=="Male") echo "checked"; ?>
            > Male

            &nbsp;&nbsp;

            <input
                type="radio"
                name="gender"
                value="Female"
                <?php if($user['gender']=="Female") echo "checked"; ?>
            > Female

        </div>

        <label>City</label>
        <input
            type="text"
            name="city"
            value="<?php echo $user['city']; ?>"
            required
        >

        <label>Role</label>
        <input
            type="text"
            value="<?php echo ucfirst($user['role']); ?>"
            readonly
        >

        <label>Profile Picture</label>
        <input
            type="file"
            name="image"
            accept="image/*"
        >

        <button type="submit" name="update">
            Update Profile
        </button>

        <br><br>

        <button
            type="button"
            onclick="window.location.href='dashboard.php'">
            ⬅ Back to Dashboard
        </button>

    </form>

</div>

</body>
</html>