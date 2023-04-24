<?php

// Define the SignupContr class which extends the Signup class.
class SignupContr extends Signup {

    // Declare private properties for the user id, password, password repeat, and email.
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    // Define the constructor that initializes the private properties.
    public function __construct($uid, $pwd, $pwdRepeat, $email) {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    // Define the public method 'signupUser' that handles user registration.
    public function signupUser() {
        // Check for empty input and redirect with an error message if there's any.
        if ($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyinput");
            exit();
        }

        // Check for an invalid username and redirect with an error message if found.
        if ($this->invalidUid() == false) {
            header("location: ../index.php?error=username");
            exit();
        }

        // Check for an invalid email and redirect with an error message if found.
        if ($this->invalidEmail() == false) {
            header("location: ../index.php?error=email");
            exit();
        }

        // Check if the passwords match and redirect with an error message if they don't.
        if ($this->pwdMatch() == false) {
            header("location: ../index.php?error=passwordmatch");
            exit();
        }

        // Check if the user id or email is already taken and redirect with an error message if it is.
        if ($this->uidTakenCheck() == false) {
            header("location: ../index.php?error=useroremailtaken");
            exit();
        }

        // Register the new user.
        $this->setUser($this->uid, $this->pwd, $this->email);
    }

    // Define a private method 'emptyInput' that checks if any of the input fields are empty.
    private function emptyInput() {
        $result = false;

        if (empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Define a private method 'invalidUid' that checks if the user id is valid.
    private function invalidUid() {
        $result = false;

        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Define a private method 'invalidEmail' that checks if the email is valid.
    private function invalidEmail() {
        $result = false;

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Define a private method 'pwdMatch' that checks if the passwords match.
    private function pwdMatch() {
        $result = false;

        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // Define a private method 'uidTakenCheck' that checks if the user id or email is already taken.
    private function uidTakenCheck() {
        $result = false;
    
        // Call the 'checkUser' method from the Signup class to see if the user id or email is already taken.
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

// Define a public function called 'fetchUserId' that takes a single argument: '$uid'
public function fetchUserId($uid) {
    // Call the 'getUserId' method with the provided '$uid' and store the result in '$userId'
    $userId = $this->getUserId($uid);

    // Return the value of the 'users_id' column from the first row of the '$userId' array
    return $userId[0]["users_id"];
}

}    


//This code defines the `SignupContr` class, which extends the `Signup` class. 
// It has private properties for user id, password, password repeat, and email. 
// The class provides methods for validating user input and registering new users. 
// The `signupUser` method is the main method that performs all checks and calls 
// the `setUser` method to register a new user if all the input is valid. 
// The class has additional private methods for checking various aspects of 
// user input such as empty fields, invalid user id, invalid email, password mismatch,
//  and user id or email availability.
//This public function, 'fetchUserId', takes a single argument, '$uid', and retrieves 
//the user ID for the specified user. It does this by calling the 'getUserId' method with 
//the provided '$uid' and storing the result in the '$userId' variable. The function then 
//returns the value of the 'users_id' column from the first row of the '$userId' array.
