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

<!-- Create the profile settings section -->
<section class="profile">
    <div class="profile-bg">
        <div class="wrapper">
            <div class="profile-settings">
                <!-- Add a heading for the profile settings section -->
                <h3>Profile Settings</h3>

                <!-- Prompt the user to change their 'about' section -->
                <p>Change your about section here!</p>

                <!-- Create a form for updating profile information -->
                <form action="includes/profileinfo.inc.php" method="post">
                    <!-- Create a textarea for the 'about' section with the current value -->
                    <textarea name="about" rows="10" cols="30" placeholder="Profile about section..."><?php $profileInfo->fetchAbout($_SESSION['userid']);?></textarea>
                    
                    <br><br>
                    
                    <!-- Prompt the user to change their profile page intro -->
                    <p>Change your profile page intro here!</p>
                    
                    <br>
                    
                    <!-- Create an input field for the 'introtitle' with the current value -->
                    <input type="text" name="introtitle" placeholder="Profile title..." value="<?php $profileInfo->fetchTitle($_SESSION['userid']); ?>">

                    <!-- Create a textarea for the 'introtext' with the current value -->
                    <textarea name="introtext" rows="10" cols="30" placeholder="Profile introduction..."><?php $profileInfo->fetchText($_SESSION['userid']);?></textarea>
                    
                    <!-- Add a 'SAVE' button to submit the form -->
                    <button type="submit" name="submit">SAVE</button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>

<!-- This code snippet creates a profile settings page for a user. 
It starts by including the necessary PHP files for handling database connections, 
profile information, and the user interface. It then creates an instance of the 
'ProfileInfoView' class to fetch and display the user's profile information.

The HTML portion of the code creates a profile settings section with a background 
image and a form for the user to update their profile information. The form includes 
fields for updating the 'about' section, the profile title, and the profile introduction text. 
Each field is pre-populated with the user's current information. A 'SAVE' button is provided to 
submit the form and update the user's profile information. -->
