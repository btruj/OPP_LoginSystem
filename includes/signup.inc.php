<?php

if(isset($_POST['submit'])){

    //Grabbing the data
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
    $pwdRepeat = $_POST['pwd-repeat'];
    $email = $_POST['email'];

    //Instantiate SignupContr class-*order is important dbh MUST go first!
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

    //Running error handlers and user signup 
    $signup->signupUser();   

    //Going back to front page
    header("location: ../index.php?error=none");
};