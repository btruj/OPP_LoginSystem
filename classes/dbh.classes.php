<?php

class Dbh{

    protected function connect(){
        try{
            $username = "admin";
            $password = "1234";
            $dbh = new PDO('mysql:host=localhost;dbname=ooplogin', $username, $password);
            return $dbh;
        }
        catch(PDOException $e){
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

    }

}
