<?php

// Define a PHP class called 'ProfileInfoContr' which extends another class called 'ProfileInfo'
class ProfileInfoContr extends ProfileInfo {
    
    // Declare private properties for the class: 'userId' and 'userUid'
    private $userId;
    private $userUid;

    // Define a constructor for the class that takes two arguments: '$userId' and '$userUid'
    public function __construct($userId, $userUid){
        // Assign the provided arguments to the class properties
        $this->userId = $userId;
        $this->userUid = $userUid;
    }

    // Define a method called 'defaultProfileInfo' to set the default profile information
    public function defaultProfileInfo(){
        // Define default values for the profile
        $profileAbout = "Tell people about yourself! Your interests, hobbies, and personality traits.";
        $profileTitle = "Hi! I am " . $this->userUid;
        $profileText = "Welcome to my profile page! I hope you enjoy it. Soon I'll be able to tell you more about myself, and what you can find on my profile page.";
        
        // Call the 'setProfileInfo' method from the parent 'ProfileInfo' class
        $this->setProfileInfo($profileAbout, $profileTitle, $profileText, $this->userId);
    }

    // Define a method called 'updateProfileInfo' that takes three arguments: '$about', '$introTitle', and '$introText'
    public function updateProfileInfo($about, $introTitle, $introText){
        // Check if the provided input is empty
        if ($this->emptyInputCheck($about, $introTitle, $introText) == true) {
            // If empty, redirect the user to the profile settings page with an error message
            header("location: ../profilesettings.php?error=emptyinput");
            exit();
        }
        
        // If not empty, call the 'setNewProfileInfo' method from the parent 'ProfileInfo' class to update the profile information
        $this->setNewProfileInfo($about, $introTitle, $introText, $this->userId);
    }

    // Define a method called 'emptyInputCheck' that takes three arguments: '$about', '$introTitle', and '$introText'
    public function emptyInputCheck($about, $introTitle, $introText){
        // Initialize a variable called '$result' and set its value to 'false'
        $result = false;
        
        // Check if any of the provided input values are empty
        if (empty($about) || empty($introTitle) || empty($introText)) {
            // If any of the inputs are empty, set the value of '$result' to 'true'
            $result = true;
        } else {
            // If none of the inputs are empty, set the value of '$result' to 'false'
            $result = false;
        }
        
        // Return the value of '$result'
        return $result;
    }
}

// The class ProfileInfoContr extends another class called ProfileInfo, and it is responsible for setting and updating the profile information. It has methods like defaultProfileInfo, updateProfileInfo, and emptyInputCheck.