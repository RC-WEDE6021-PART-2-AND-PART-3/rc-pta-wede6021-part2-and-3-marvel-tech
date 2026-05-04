<?php include 'DBConn.php'; ?>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <header><h1>PASTIMES: Football Kit Resale</h1></header>
    <div class="container">
        <h2>Register New Account</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="uname" placeholder="Choose Username" required>
            <input type="password" name="pass" placeholder="Password (min 8 chars)" minlength="8" required>
            <textarea name="addr" placeholder="Gauteng Delivery Address" required></textarea>
            <button type="submit" name="register">Register</button>
        </form>
        <?php
        if(isset($_POST['register'])){
            $hash = md5($_POST['pass']); 
            $sql = "INSERT INTO tblUser (fullName, email, username, password, address) VALUES (?, ?, ?, ?, ?)";            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $_POST['name'], $_POST['email'], $_POST['uname'], $hash, $_POST['addr']);
            if($stmt->execute()) echo "<p>Registration pending admin verification!</p>";
        }
        ?>
        <p><a href="login.php">Already have an account? Login here.</a></p>
        <p><a href="admin_login.php">Admin Access</a></p>
    </div>
</body>
</html>