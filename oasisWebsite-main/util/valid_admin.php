<?php
/*
 * Date: 09/22/2021
 * Name: Brianna Baldwin
 * Description: Authentication for admin
 * Mod Log:
 *      09/22/2021 - initial deployment of authentication
 */
require_once('model/database.php');
require_once('model/admin_db.php');

$email = '';
$password = '';    
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $email = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];    
}

if (!is_valid_admin_login($email, $password)) {
    header('WWW-Authenticate: Basic realm="Admin"');
    header('HTTP/1.0 401 Unauthorized');
    include('./error.php');
    exit();
}
?>
