<?php

// Define the Dbh class which will be responsible for connecting to the database.
class Dbh {

    // Define a protected method called 'connect' that can be inherited by other classes.
    protected function connect() {
        try {
            // Set the database connection credentials.
            $username = "admin";
            $password = "1234";
            
            // Create a new PDO object to establish a connection with the database.
            // The connection details include the database type (MySQL), host, and database name.
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
            
            // Return the PDO object (database connection) to be used by other classes.
            return $dbh;
        }
        // If an error occurs during the connection process, catch the exception.
        catch (PDOException $e) {
            // Print the error message and terminate the script with 'die()'.
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
// This code defines a class called Dbh which is responsible for connecting to the database. 
//The connect() method establishes the connection using the PDO class and the provided credentials. 
//In case of an error during the connection, the error message is printed, and the script is terminated.