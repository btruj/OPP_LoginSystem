<?php
     include_once 'header.php';
?>

<!-- Create the intro section -->
<section class="index-intro">
    <div class="index-intro-bg">
        <div class="index-intro-content">
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