<?php
session_start();
include 'DBConn.php';

if (isset($_POST['admin_login'])) {
    $user = $_POST['uname'];
    $pass = $_POST['pass']; 

    $sql = "SELECT * FROM tblAdmin WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin'] = $user;
        header("Location: admin_dashboard.php");
    } else {
        $error = "Invalid Admin Credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - Pastimes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Administrator Portal</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="uname" placeholder="Admin Username" required>
            <input type="password" name="pass" placeholder="Admin Password" required>
            <button type="submit" name="admin_login">Login as Admin</button>
        </form>
        <p><a href="index.php">Back to Main Site</a></p>
    </div>
</body>
</html>