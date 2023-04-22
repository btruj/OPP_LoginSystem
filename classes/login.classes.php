<?php

// Define the Login class which extends the Dbh class.
class Login extends Dbh {

    // Define a protected method called 'getUser', which takes the user id and password as arguments.
    protected function getUser($uid, $pwd) {
        // Prepare an SQL statement to fetch the hashed password for the given user id or email.
        $stmt = $this->connect()->prepare('SELECT users_pwd FROM users WHERE users_uid = ? OR users_email = ?;');

        // Execute the prepared statement with the provided user id as both parameters.
        if (!$stmt->execute(array($uid, $uid))) {
            // If the statement execution fails, close the statement and redirect with an error message.
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        // If no matching user is found in the database, close the statement and redirect with an error message.
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }

        // Fetch the hashed password from the database.
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Verify the provided password against the stored hashed password.
        $checkPwd = password_verify($pwd, $pwdHashed[0]["users_pwd"]);

        // If the password verification fails, close the statement and redirect with an error message.
        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../index.php?error=wrongpassword");
            exit();
        // If the password verification succeeds, fetch all the user data for the given user id or email.
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE users_uid = ? OR users_email = ? AND users_pwd = ?;');
            if (!$stmt->execute(array($uid, $uid, $pwdHashed[0]['users_pwd']))) {
                // If the statement execution fails, close the statement and redirect with an error message.
                $stmt = null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            // Fetch the user data from the database.
            $loginData = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // If no user data is found, close the statement and redirect with an error message.
            if (count($loginData) == 0) {
                $stmt = null;
                header("location: login.php?error=usernotfound");
                exit();
            }

            // Start a new session and store the user data in session variables.
            session_start();
            $_SESSION["userid"] = $loginData[0]["users_id"];
            $_SESSION["useruid"] = $loginData[0]["users_uid"];

            // Close the statement.
            $stmt = null;

            // Return the fetched user data.
            return $loginData;
        }
    }

}

// This code defines a Login class that extends the Dbh class. The getUser method is responsible for fetching user information based on the user id or email and verifying the provided password against the stored hashed password. The method first prepares and executes an SQL statement to fetch the hashed password. If no matching user is found or if the password verification fails, the method redirects with an appropriate error message. If the password verification succeeds, the method fetches all user data for the given user id or email, stores the relevant data in session variables, and returns the fetched user data.