<?php

// Define a PHP class called 'ProfileInfo' which extends another class called 'Dbh'
class ProfileInfo extends Dbh {

    // Define a protected method called 'getProfileInfo' that takes a single argument: '$userId'
    protected function getProfileInfo($userId) {
        // Prepare an SQL statement to select all columns from the 'profiles' table where 'users_id' matches the provided user ID
        $stmt = $this->connect()->prepare('SELECT * FROM profiles WHERE users_id = ?;');

        // Execute the SQL statement with the provided user ID
        // If execution fails, set '$stmt' to null and redirect to 'profile.php' with an error message
        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        // If there are no rows returned, set '$stmt' to null and redirect to 'profile.php' with an error message
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: profile.php?error=profilenotfound");
            exit();
        }

        // Fetch all rows as an associative array and return the result
        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $profileData;
    }

    // Define a protected method called 'setNewProfileInfo' that takes four arguments: '$profileAbout', '$profileTitle', '$profileText', and '$userId'
    protected function setNewProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
        // Prepare an SQL statement to update the 'profiles' table with the new profile information where 'users_id' matches the provided user ID
        $stmt = $this->connect()->prepare('UPDATE profiles SET profiles_about = ?, profiles_introtitle = ?, profiles_introtext = ? WHERE users_id = ?;');

        // Execute the SQL statement with the provided profile information and user ID
        // If execution fails, set '$stmt' to null and redirect to 'profile.php' with an error message
        if (!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        // Set '$stmt' to null
        $stmt = null;
    }

    // Define a protected method called 'setProfileInfo' that takes four arguments: '$profileAbout', '$profileTitle', '$profileText', and '$userId'
    protected function setProfileInfo($profileAbout, $profileTitle, $profileText, $userId) {
        // Prepare an SQL statement to insert the profile information into the 'profiles' table
        $stmt = $this->connect()->prepare('INSERT INTO profiles (profiles_about, profiles_introtitle, profiles_introtext, users_id) VALUES (?, ?, ?, ?);');

        // Execute the SQL statement with the provided profile information and user ID
        // If execution fails, set '$stmt' to null and redirect to 'profile.php' with an error message
        if (!$stmt->execute(array($profileAbout, $profileTitle, $profileText, $userId))) {
            $stmt = null;
            header("location: profile.php?error=stmtfailed");
            exit();
        }

        // Set '$stmt' to null
        $stmt = null;
    }
}


// The code defines a PHP class called 'ProfileInfo' that extends another class called 'Dbh'. The 'ProfileInfo' class has three protected methods:

//     'getProfileInfo': This method takes a single argument, '$userId', and fetches the profile information for the specified user from the 'profiles' table in the database. It prepares and executes an SQL statement, handling errors by setting '$stmt' to null and redirecting to 'profile.php' with an error message. If successful, it returns the fetched profile data as an associative array.

//     'setNewProfileInfo': This method takes four arguments - '$profileAbout', '$profileTitle', '$profileText', and '$userId' - and updates the profile information for the specified user in the 'profiles' table. It prepares and executes an SQL statement to update the corresponding columns in the table, handling errors similarly to the 'getProfileInfo' method. After executing the statement, '$stmt' is set to null.

//     'setProfileInfo': This method also takes the same four arguments as 'setNewProfileInfo' and inserts the profile information for the specified user into the 'profiles' table. It prepares and executes an SQL statement to insert the profile information into the table, handling errors similarly to the other two methods. After executing the statement, '$stmt' is set to null.