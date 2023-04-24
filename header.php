<?php
// Start a new session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <nav>
        <div>
            <!-- Create the main menu -->
            <ul class="menu-main">
                <li><a href="index.php">HOME</a></li>
                <li><a href="#">PRODUCTS</a></li>
                <li><a href="#">CURRENT SALES</a></li>
                <li><a href="#">MEMBER</a></li>
            </ul>
        </div>
        <!-- Create the member menu -->
        <ul class="menu-member">
            <?php
            // Check if the user is logged in
            if (isset($_SESSION["useruid"])) {
            ?>
                <!-- Show the user's username and a logout link -->
                <li><a href="profile.php"><?php echo $_SESSION["useruid"]; ?></a></li>
                <li><a href="includes/logout.inc.php">LOGOUT</a></li>
            <?php
            } else {
            ?>
                <!-- Show the sign-up and login links -->
                <li><a href="#">SIGN UP</a></li>
                <li><a href="#" class="header-login-a">LOGIN</a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</header>