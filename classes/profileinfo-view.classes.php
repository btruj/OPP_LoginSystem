<?php

// Define a PHP class called 'ProfileInfoView' which extends another class called 'ProfileInfo'
class ProfileInfoView extends ProfileInfo {

    // Define a method called 'fetchAbout' that takes a single argument: '$userId'
    public function fetchAbout($userId) {
        // Call the 'getProfileInfo' method from the parent 'ProfileInfo' class
        // to retrieve the profile information for the given user ID
        $profileInfo = $this->getProfileInfo($userId);

        // Output the 'profiles_about' field from the retrieved profile information
        echo $profileInfo[0]["profiles_about"];
    }

    // Define a method called 'fetchTitle' that takes a single argument: '$userId'
    public function fetchTitle($userId) {
        // Call the 'getProfileInfo' method from the parent 'ProfileInfo' class
        // to retrieve the profile information for the given user ID
        $profileInfo = $this->getProfileInfo($userId);

        // Output the 'profiles_introtitle' field from the retrieved profile information
        echo $profileInfo[0]["profiles_introtitle"];
    }

    // Define a method called 'fetchText' that takes a single argument: '$userId'
    public function fetchText($userId) {
        // Call the 'getProfileInfo' method from the parent 'ProfileInfo' class
        // to retrieve the profile information for the given user ID
        $profileInfo = $this->getProfileInfo($userId);

        // Output the 'profiles_introtext' field from the retrieved profile information
        echo $profileInfo[0]["profiles_introtext"];
    }
}

//The class ProfileInfoView extends another class called ProfileInfo, 
// and it is responsible for fetching and displaying the profile information
//  for a given user ID. It has methods like fetchAbout, fetchTitle, and fetchText, 
//  each of which retrieves and outputs a specific piece of profile information.