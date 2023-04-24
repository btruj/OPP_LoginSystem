<?php
// Include the 'header.php' file
include_once 'header.php';

// Include the necessary classes for database handling and profile information
include "classes/dbh.classes.php";
include "classes/profileinfo.classes.php";
include "classes/profileinfo-view.classes.php";

// Create a new instance of the 'ProfileInfoView' class
$profileInfo = new ProfileInfoView();
?>

<!-- Create the profile section -->
<section class="profile">
    <div class="profile-bg">
        <div class="wrapper">
          <div class="profile-info">
            <div class="profile-info-img">
                <p>
                    <?php
                        // Display the user's username
                        echo ($_SESSION['useruid']);
                    ?>
                </p>
                <div class="break"></div>
                <!-- Add a link to the profile settings page -->
                <a href="profilesettings.php" class="follow-btn">PROFILE SETTINGS</a>
            </div>
            <div class="profile-info-about">
                <h3>ABOUT</h3>
                <p>
                    <?php
                        // Fetch and display the user's 'about' information
                        $profileInfo->fetchAbout($_SESSION['userid']);
                    ?>
                </p>
                <h3>FOLLOWERS</h3>
                <h3>FOLLOWING</h3>
            </div>
          </div>
          <div class="profile-content">
            <div class="profile-intro">
                <h3>
                <?php
                        // Fetch and display the user's profile title
                        $profileInfo->fetchTitle($_SESSION['userid']);
                    ?>
                </h3>
                <p>
                <?php
                        // Fetch and display the user's profile text
                        $profileInfo->fetchText($_SESSION['userid']);
                    ?>
                </p>
            </div>
            <div class="profile-posts">
                <h3>POSTS</h3>
                <!-- Add static example posts -->
                <div class="profile-post">
                    <h2>IT IS A BUSY DAY IN TOWN</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                    <p>12:46 -9/12/2021</p>
                </div>
                <div class="profile-post">
                    <h2>RE-USING ELECTRONICS IS A GOOD IDEA</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                    <p>12:42 -11/11/2022</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<!-- Close the body and HTML tags -->
</body>
</html>

<!-- This code snippet creates a profile page for a user. It starts by including the necessary 
PHP files for handling database connections, profile information, and the user interface.
 It then creates an instance of the 'ProfileInfoView' class to fetch and display the user's 
 profile information.

The HTML portion of the code creates a profile section with a background image, profile information, 
and profile content. It displays the user's username, a link to their profile settings, their 'about' 
information, and a list of their followers and following. It also shows their profile title and text, 
as well as some static example posts. -->