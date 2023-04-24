<?php

// Define the loginContr class which extends the Login class.
class loginContr extends Login {

    // Define private properties for the user id and password.
    private $uid;
    private $pwd;

    // Define a public constructor that takes the user id and password as arguments.
    public function __construct($uid, $pwd) {
        // Assign the provided user id and password to the corresponding class properties.
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    // Define a public method called 'loginUser' which is responsible for logging in the user.
    public function loginUser() {
        // Call the 'emptyInput' method to check if the user id and password are empty.
        if ($this->emptyInput() == false) {
            // If either the user id or password is empty, redirect to the index page with an error message.
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // Call the 'getUser' method inherited from the Login class to authenticate the user.
        $this->getUser($this->uid, $this->pwd);
    }

    // Define a private method called 'emptyInput' which checks if the user id and password are empty.
    private function emptyInput() {
        $result = false;

        // If either the user id or password is empty, set the result to false.
        if (empty($this->uid) || empty($this->pwd)) {
            $result = false;
        }
        // Otherwise, set the result to true.
        else {
            $result = true;
        }
        // Return the result.
        return $result;
    }
}

//This code defines a loginContr class that extends the Login class. 
// The class has two private properties, $uid and $pwd, which are assigned values when the object is instantiated.
// the loginUser method is responsible for logging in the user. It first checks if the user id and password are 
//empty using the emptyInput method. If either input is empty, the user is redirected to the index page with an 
//error message. If both inputs are not empty, the getUser method from the Login class is called to authenticate
//the user. The emptyInput method is a private method that checks if the user id and password are empty and 
//returns a boolean result.