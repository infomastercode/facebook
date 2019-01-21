<?php
require_once __DIR__ . '/vendor/autoload.php'; // change path as needed

$fb = new \Facebook\Facebook([
  'app_id' => '209613849524420',
  'app_secret' => '831f8e5bccd93bed4dc22d03ad288173',
  'default_graph_version' => 'v2.10',
  //'default_access_token' => '{access-token}', // optional
]);

// Use one of the helper classes to get a Facebook\Authentication\AccessToken entity.
//   $helper = $fb->getRedirectLoginHelper();
//   $helper = $fb->getJavaScriptHelper();
//   $helper = $fb->getCanvasHelper();
//   $helper = $fb->getPageTabHelper();

try {
  // Get the \Facebook\GraphNodes\GraphUser object for the current user.
  // If you provided a 'default_access_token', the '{access-token}' is optional.
  $response = $fb->get('/me?fields=id,name,email', 'EAACZBpIcKeMQBAGlkCjRp1PZBoGvCWaIMfnpmLSnsZCWATSdZBgl4KWjPPZCPIlY2QdiZAbng2NHfZAk92banXmjKAS3lQCKWfRmgwimr9JTEn88Cc6128r4u6rFxZBB48qTWNftBTCpfGXOQfIPSGhfLubN0kLQQuZC15qGB7jukqdJ43GkMZAMqHR7i2cESoDNKL7SDPgXK49wZDZD');
} catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();
echo '<pre>'; print_r($me->getEmail()); exit; 
echo 'Logged in as ' . $me->getName();