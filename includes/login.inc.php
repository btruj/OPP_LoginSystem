<?php

// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Grab the submitted data from the form
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];

    // Include necessary class files
    // The order is important: Dbh class must be included first
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    // Instantiate the LoginContr class with the user data
    $login = new LoginContr($uid, $pwd);

    // Run error handlers and log the user in
    $login->loginUser();

    // Redirect to the front page with no errors
    header("location: ../index.php?error=none");
}

// This code checks if the form is submitted. If the form is submitted, it retrieves the submitted user data (UID and password) and includes the necessary class files. The order of inclusion is important: the Dbh class should be included first. Then, the Login and LoginContr classes are included.

// After including the class files, an instance of the LoginContr class is created with the user data. The loginUser method is called to handle errors and log the user in. Finally, the user is redirected to the front page with no errors.