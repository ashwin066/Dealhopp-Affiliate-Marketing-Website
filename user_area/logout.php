 <?php
session_start();
session_unset();
include('../google_config.php');
//Reset OAuth access token
$google_client->revokeToken();
session_destroy();
 
if (isset($_COOKIE['username'])) {
    unset($_COOKIE['username']);
    setcookie('username', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['user_id'])) {
    unset($_COOKIE['user_id']);
    setcookie('user_id', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['user_image'])) {
    unset($_COOKIE['user_image']);
    setcookie('user_image', '', time() - 3600, '/'); // empty value and old timestamp
}
if (isset($_COOKIE['user_type'])) {
    unset($_COOKIE['user_type']);
    setcookie('user_type', '', time() - 3600, '/'); // empty value and old timestamp
}
echo "Sussesfully Loged out";
echo '<meta http-equiv = "refresh" content = "0.1; url = ../index.php" />';
?>