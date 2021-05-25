<?php 

session_start();

require_once 'inc/config.inc.php';
include_once 'inc/db.php';

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  #echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
#echo '<h3>Access Token</h3>';
#var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
#echo '<h3>Metadata</h3>';
#var_dump($tokenMetadata);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('{app-id}'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }

  #echo '<h3>Long-lived</h3>';
  #var_dump($accessToken->getValue());
}

$response = $fb->get("/me?fields=id,first_name,last_name,email,hometown,birthday", $accessToken);
$userData = $response->getDecodedBody();
#echo "<pre";
#var_dump($userData);

#echo '<br><br>';

#echo 'HERE' . $userData['email'] . $userData['first_name'] . $userData['last_name'] . $userData['hometown']['name'] . $userData['birthday'];

$_SESSION['fb_access_token'] = (string) $accessToken;

$userEmail = $userData['email'];
$userFirst = $userData['first_name'];
$userLast = $userData['last_name'];
$userTown = 'London';
$userDob = $userData['birthday'];

$time = strtotime($userDob);
$userDob = date('Y-m-d',$time);


$sql = "SELECT * FROM users WHERE email ='$userEmail'";
$result = mysqli_query($mysqli, $sql);
$resultCheck = mysqli_num_rows($result);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		#echo 'yeah boi';
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['first'] = $row['firstname'];
		$_SESSION['last'] = $row['lastname'];
		$_SESSION['admin'] = $row['admin'];
		$_SESSION['city'] = $row['favourite_city'];

		$cookie_user_id = $_SESSION['user_id'];
		$cookie_email = $_SESSION['email'];
		$cookie_first = $_SESSION['first'];
		$cookie_last = $_SESSION['last'];
		$cookie_admin = $_SESSION['admin'];
		$cookie_city = $_SESSION['city'];

		setcookie('user_id', $cookie_user_id, time() + (86400 * 14), "/");
		setcookie('email', $cookie_email, time() + (86400 * 14), "/");
		setcookie('first', $cookie_first, time() + (86400 * 14), "/");
		setcookie('last', $cookie_last, time() + (86400 * 14), "/");
		setcookie('admin', $cookie_admin, time() + (86400 * 14), "/");
		setcookie('city', $cookie_city, time() + (86400 * 14), "/");
	}

	header("Location: profile.php?login=success");	
	exit();
} else {

	$password = mysqli_real_escape_string($mysqli, md5( rand(0,1000) ));
	$hash = mysqli_real_escape_string($mysqli, md5( rand(0,1000) ));


	$sql = "INSERT INTO users (email, firstname, lastname, password, hash, active, admin, dob, favourite_city) VALUES ('$userEmail', '$userFirst', '$userLast', '$password', '$hash', '1', '0', '$userDob', '$userTown');";

	$result = mysqli_query($mysqli, $sql);

	sleep(2);

	$sql = "SELECT * FROM users WHERE email ='$userEmail'";
	$result = mysqli_query($mysqli, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			#echo 'yeah boi';
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['first'] = $row['firstname'];
			$_SESSION['last'] = $row['lastname'];
			$_SESSION['admin'] = $row['admin'];
			$_SESSION['city'] = $row['favourite_city'];

			$cookie_user_id = $_SESSION['user_id'];
			$cookie_email = $_SESSION['email'];
			$cookie_first = $_SESSION['first'];
			$cookie_last = $_SESSION['last'];
			$cookie_admin = $_SESSION['admin'];
			$cookie_city = $_SESSION['city'];

			setcookie('user_id', $cookie_user_id, time() + (86400 * 14), "/");
			setcookie('email', $cookie_email, time() + (86400 * 14), "/");
			setcookie('first', $cookie_first, time() + (86400 * 14), "/");
			setcookie('last', $cookie_last, time() + (86400 * 14), "/");
			setcookie('admin', $cookie_admin, time() + (86400 * 14), "/");
			setcookie('city', $cookie_city, time() + (86400 * 14), "/");
		}

		header("Location: profile.php?login=success");	
		exit();
	}
}


// User is logged in with a long-lived access token.
// You can redirect them to a members-only page.
//header('Location: https://example.com/members.php');

?>