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
                <li><a href="#"><?php echo $_SESSION["useruid"]; ?></a></li>
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

<!-- Create the intro section -->
<section class="index-intro">
    <div class="index-intro-bg">
        <div class="wrapper">
            <div class="index-intro-c1">
                <div class="video"></div>
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam,</p>
            </div>
            <div class="index-intro-c2">
                <h2>we make<br>professional<br>gear</h2>
                <a href="#">FIND OUR GEAR HERE</a>
            </div>
        </div>
    </div>
</section>

<!-- Create the login section -->
<section class="index-login">
    <div class="wrapper">
        <div class="index-login-signup">
            <h4>SIGN UP</h4>
            <p>Don't have an account? Sign up here!</p>
            <!-- Create the sign-up form -->
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat Password">
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>
        <div class="index-login-login">
            <h4>LOGIN</h4>
            <p>Already have an account? Login here!</p>
            <!-- Create the login form -->
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </div

</section>
</body>
</html>
<!-- 
The entire code consists of an HTML document with a header containing the main menu and member menu, an intro section, and a login section with both sign-up and login forms. -->