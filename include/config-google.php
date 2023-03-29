<?php
session_start();

//Include Google Client Library for PHP autoload file
require_once './google/vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google\Client();

$google_client->setApplicationName('Fiesta');

//Set the OAuth 2.0 Client ID
$google_client->setClientId('869671151509-gipk8r9hfqosagm8990hrf1mbako5lo0.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/RentalManagement/login.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

$google_service = new Google\Service\Oauth2($google_client);