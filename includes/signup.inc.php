<?php

// Check if the form has been submitted
if (isset($_POST['submit'])) {

    // Retrieve the submitted form data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];
    $email = $_POST['email'];

    // Include the required class files
    // Note: The order is important, Dbh must be included first
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";

    // Instantiate the SignupContr class with the submitted data
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    // Run the error handlers and complete the user registration process
    $signup->signupUser();

    // Redirect the user back to the front page with no errors
    header("location: ../index.php?error=none");
}

// This code checks if the form has been submitted using isset($_POST['submit']). If the form is submitted, it retrieves the submitted data, such as username, password, repeated password, and email.

// It then includes the necessary class files in the correct order: first the database handler class (dbh.classes.php), then the signup class (signup.classes.php), and finally the signup controller class (signup-contr.classes.php).

// After including the class files, it instantiates the SignupContr class with the submitted data and calls the signupUser() method to run the error handlers and complete the user registration process.

// Lastly, the user is redirected back to the front page with no errors using the header() function.