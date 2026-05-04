<?php 
session_start();
include 'DBConn.php'; 
$error = "";
$sticky_user = "";

if(isset($_POST['login'])){
    $u = $_POST['uname'];
    $e = $_POST['email'];
    $p = md5($_POST['pass']);
    $sticky_user = $u;

    $res = $conn->query("SELECT * FROM tblUser WHERE username='$u' AND email='$e' AND password='$p'");
    if($res->num_rows > 0){
        $user = $res->fetch_assoc();
        if($user['status'] == 'Verified'){
            $_SESSION['user'] = $user['fullName'];
            header("Location: shop.php");
        } else {
            $error = "Account pending verification.";
        }
    } else {
        $error = "Invalid Credentials. Try again.";
    }
}
?>
<html>
<head><link rel="stylesheet" href="style.css"></head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <?php if($error) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="uname" placeholder="Username" value="<?php echo $sticky_user; ?>" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>