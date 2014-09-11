<?php
require 'assets/procedures/twitter/twitteroauth.php';
require 'assets/procedures/config-social/twconfig.php';
session_start();

$twitteroauth = new TwitterOAuth("4gJzoLbZ8s58f5Ncm8Bw", "WTMYIdrefA7SCSNFlPFvBaZFPVbZhlfxPY9EkZ9g");
// Requesting authentication tokens, the parameter is the URL we will be redirected to
$request_token = $twitteroauth->getRequestToken('http://www.a3workout.com/getTwitterData.php');

// Saving them into the session

$_SESSION['oauth_token'] = "132253911-5P9lAKSwzJFHVza3hEVfaJhZ6txZwJouZcTj2LUr";
$_SESSION['oauth_token_secret'] = "nFS6EEsZVgbatXL82GlNbUXM19slS9UiqAcS1Jw8M";

// If everything goes well..
if ($twitteroauth->http_code == 200) {
    // Let's generate the URL and redirect
    $url = $twitteroauth->getAuthorizeURL($request_token['oauth_token']);
    header('Location: ' . $url);
} else {
    // It's a bad idea to kill the script, but we've got to know when there's an error.
    die('Something wrong happened.');
}
?>
