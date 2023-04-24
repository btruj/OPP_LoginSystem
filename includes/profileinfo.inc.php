<?php

// Start a new PHP session or resume an existing one
session_start();

// Check if the request method is 'POST'
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Store the user ID and username from the session in variables
    $id = $_SESSION['userid'];
    $uid = $_SESSION['useruid'];

    // Sanitize and store the submitted profile information in variables
    $about = htmlspecialchars($_POST['about'], ENT_QUOTES, 'UTF-8');
    $introTitle = htmlspecialchars($_POST['introtitle'], ENT_QUOTES, 'UTF-8');
    $introText = htmlspecialchars($_POST['introtext'], ENT_QUOTES, 'UTF-8');

    // Include the required classes
    include "../classes/dbh.classes.php";
    include "../classes/profileinfo.classes.php";
    include "../classes/profileinfo-contr.classes.php";

    // Create a new 'ProfileInfoContr' object with the user ID and username
    $profileinfo = new ProfileinfoContr($id, $uid);

    // Update the profile information by calling the 'updateProfileInfo' method on the 'ProfileInfoContr' object
    $profileinfo->updateProfileInfo($about, $introTitle, $introText);

    // Redirect the user to the 'profile.php' page with a 'none' error message
    header("location: ../profile.php?error=none");
}

//This script processes the submitted profile information from a form using the POST method.
//  It starts by checking if the request method is POST, then retrieves the user ID and 
//  username from the session. It sanitizes the submitted profile information and stores 
//  them in variables. The script then includes the required classes and creates a 
//  new ProfileInfoContr object with the user ID and username. It calls the updateProfileInfo 
//  method to update the profile information and finally redirects the user to the profile.php 
//  page with a 'none' error message.