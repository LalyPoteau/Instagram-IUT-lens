<?php
require_once 'application/helpers/queries/user.php';
if(isset($_COOKIE['rememberme'])){
setcookie('rememberme', '', time() - 3600, "/");
delete_remember_token($_SESSION['user']['id']); }
session_destroy();

header("Location: ".URL_INDEX);
?>