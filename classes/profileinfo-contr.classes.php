<?php

class ProfileInfoContr extends ProfileInfo{
    
    private $userId;
    private $userUid;

    public function __construct($userId, $userUid){
        $this->userId = $userId;
        $this->userUid = $userUid;
}

public function defaultProfileInfo(){
    $profileAbout = "Tell people about yourself! Your interests, hobbies, and personality traits.";
    $profileTitle = "Hi! I am " . $this->userUid;
    $profileText = "Welcome to my profile page! I hope you enjoy it. Soon I'll be able to tell you more about myself, and what you can find on my profile page.";
    $this->setProfileInfo( $profileAbout, $profileTitle, $profileText, $this->userId);
   }

   public function updateProfileInfo($about, $introTitle, $introText){ 
    //error handlers
    if($this->emptyInputCheck($about, $introTitle, $introText) == true){
        header("location: ../profilesettings.php?error=emptyinput");
        exit();
    }
    //update profile info
    $this->setNewProfileInfo( $about, $introTitle, $introText, $this->userId);
  }

  public function emptyInputCheck($about, $introTitle, $introText){
    $result = false;
    if(empty($about) || empty($introTitle) || empty($introText)){
        $result = true;
    }
    else {
        $result = false;
    }
      return $result;
 }

}