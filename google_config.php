<?php

//start session on web page
// session_start();

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('424645655483-ci2bt0o8gpnsg2lu8gsvjb0bp4oc8q2m.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/dealhopp/');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');
