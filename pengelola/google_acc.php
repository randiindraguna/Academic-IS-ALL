<?php
//Include GP config file && User class
include_once 'gpConfig.php';

if(isset($_GET['code'])){
  $gClient->authenticate($_GET['code']);
  $_SESSION['token'] = $gClient->getAccessToken();
  header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
  //Get user profile data from google
  $gpUserProfile = $google_oauthV2->userinfo->get();
  
  //Initialize User class
  
  
  //Insert or update user data to the database
    

        $_SESSION['user_id'] = $gpUserProfile['id'];
        $_SESSION['full_name'] = $gpUserProfile['given_name']." ".$gpUserProfile['family_name'];
        $_SESSION['email'] = $gpUserProfile['email'];
        $_SESSION['unique_link_user'] = $gpUserProfile['link'];
        $_SESSION['user_picture'] = $gpUserProfile['picture'];

    header("location: saring_akun_google.php");
  
  
} else {
  $authUrl = $gClient->createAuthUrl();
  header("location: ".$authUrl);  
}
?>