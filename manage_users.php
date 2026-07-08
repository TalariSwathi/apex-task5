<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM users");
$totalUsers = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

    <h2>Manage Users</h2>

    <p style="text-align:center; margin-bottom:20px;">
        <strong>Total Registered Users: <?php echo $totalUsers; ?></strong>
    </p>

    <table>
        <tr>
            <th>S.No</th>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>City</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        $count = 1;

        while($row = mysqli_fetch_assoc($result))
        {
        ?>

        <tr>

            <td><?php echo $count++; ?></td>

            <td><?php echo $row['id']; ?></td>

            <td><?php echo $row['name']; ?></td>

            <td><?php echo $row['email']; ?></td>

            <td><?php echo $row['phone']; ?></td>

            <td><?php echo $row['gender']; ?></td>

            <td><?php echo $row['city']; ?></td>

            <td>
                <a class="edit-btn"
                   href="edit_user.php?id=<?php echo $row['id']; ?>">
                   ✏ Edit
                </a>
            </td>

            <td>
                <a class="delete-btn"
                   href="delete_user.php?id=<?php echo $row['id']; ?>"
                   onclick="return confirm('Are you sure you want to delete this user?');">
                   🗑 Delete
                </a>
            </td>

        </tr>

        <?php
        }
        ?>

    </table>

    <br>

    <button onclick="window.location.href='dashboard.php'">
        ⬅ Back to Dashboard
    </button>

</div>

</body>
</html>