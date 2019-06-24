<?php
session_start();

//Include Google client library 
include_once 'google-api/src/Google_Client.php';
include_once 'google-api/src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = "455547629048-iufet14s2laaoi7dhqe7hmhfem6kkd4a.apps.googleusercontent.com"; //Google client ID
$clientSecret = "LRgfuybHk-SoT2wfFTt-xA4a"; //Google client secret
$redirectURL = "http://localhost/Academic-IS-All/google_acc.php"; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to SIMBIS');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>