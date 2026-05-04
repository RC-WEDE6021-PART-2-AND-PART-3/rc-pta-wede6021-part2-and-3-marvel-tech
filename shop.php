<?php 
session_start();
include 'DBConn.php';
if(!isset($_SESSION['user'])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pastimes Football Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>PASTIMES</h1>
        <nav>
            <span>User: <strong><?php echo $_SESSION['user']; ?></strong> is logged in</span>
            <div class="nav-links">
                <a href="shop.php">Browse Kits</a>
                <a href="cart.php">View Cart (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>)</a>
                <a href="logout.php" style="color: #ff4d4d;">Logout</a>
            </div>
        </nav>
    </header>

    <div class="container">
        <h2 style="text-align: center; margin-top: 20px;">Premium Football Collection</h2>
        <div class="shop-grid">
            <?php
            $res = $conn->query("SELECT * FROM tblClothes");
            if ($res->num_rows > 0) {
                while($row = $res->fetch_assoc()) {
                    $imgPath = "images/" . $row['imageURL'];
                    
                    echo "
                    <div class='kit-card'>
                        <div class='img-container'>
                            <img src='$imgPath' alt='Jersey' onerror=\"this.src='https://via.placeholder.com/200x200?text=No+Image'\">
                        </div>
                        <h3>" . $row['teamName'] . "</h3>
                        <p class='desc'>" . $row['description'] . "</p>
                        <p class='price'>R" . number_format($row['price'], 2) . "</p>
                        <form method='POST' action='cart.php'>
                            <input type='hidden' name='id' value='" . $row['clothID'] . "'>
                            <button type='submit' name='add'>Add to Cart</button>
                        </form>
                    </div>";
                }
            } else {
                echo "<p>No kits found. Please run loadClothingStore.php.</p>";
            }
            ?>
        </div>
    </div>
</body>
</html>