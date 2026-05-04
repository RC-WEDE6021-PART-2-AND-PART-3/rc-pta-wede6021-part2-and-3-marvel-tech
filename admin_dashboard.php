<?php
session_start();
include 'DBConn.php';

if (!isset($_SESSION['admin'])) { header("Location: admin_login.php"); }

if (isset($_GET['verify'])) {
    $id = $_GET['verify'];
    $conn->query("UPDATE tblUser SET status = 'Verified' WHERE userID = $id");
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tblUser WHERE userID = $id");
}

$pending = $conn->query("SELECT * FROM tblUser WHERE status = 'Pending'");
$verified = $conn->query("SELECT * FROM tblUser WHERE status = 'Verified'");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Admin Control Panel</h1>
        <p>Logged in as: <?php echo $_SESSION['admin']; ?> | <a href="logout.php">Logout</a></p>
    </header>

    <div class="container">
        <h3>Pending Customer Verifications</h3>
        <table border="1" width="100%">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gauteng Address</th>
                <th>Action</th>
            </tr>
            <?php while($row = $pending->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['fullName']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['address']; ?></td>
                <td><a href="admin_dashboard.php?verify=<?php echo $row['userID']; ?>" class="btn-verify">Approve User</a></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <br><hr><br>

        <h3>Managed Customers (Verified)</h3>
        <table border="1" width="100%">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Action</th>
            </tr>
            <?php while($row = $verified->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['fullName']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><a href="admin_dashboard.php?delete=<?php echo $row['userID']; ?>" onclick="return confirm('Delete this user?')" style="color:red">Remove</a></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>