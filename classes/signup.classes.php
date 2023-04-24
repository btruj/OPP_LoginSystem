<?php

class Signup extends Dbh {

    // Set a new user by inserting their details into the database
    protected function setUser($uid, $pwd, $email) {
        // Prepare an SQL statement to insert the new user data into the users table
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (?, ?, ?);');

        // Hash the password for security reasons
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        // Execute the prepared statement with the given user data
        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // Close the statement
        $stmt = null;
    }

    // Check if a user with the given UID or email already exists in the database
    protected function checkUser($uid, $email) {
        // Prepare an SQL statement to select user data with the given UID or email
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid  = ? OR users_email  = ?;');

        // Execute the prepared statement with the given UID and email
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // Initialize the result variable
        $result = false;

        // If the number of rows returned is greater than 0, it means a user with the given UID or email already exists
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            // If no user is found with the given UID or email, the result check is set to true
            $resultCheck = true;
        }

        // Return the result check
        return $resultCheck;
    }

    protected function getUserId($uid){
        $stmt = $this->connect()->prepare('SELECT users_id FROM users WHERE users_uid = ?;');
    
        if(!$stmt->execute(array($uid))){   
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }
    
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
        return $profileData;
    
          }
}

// This code defines the Signup class, which extends the Dbh class. It has two protected methods: setUser and checkUser. The setUser method is responsible for inserting a new user's data into the database. It hashes the password and then executes a prepared statement to insert the data. The checkUser method checks whether a user with the given user id or email already exists in the database. It prepares and executes an SQL statement to search for a user with the given user id or email, and returns a boolean value based on whether a user is found or not.