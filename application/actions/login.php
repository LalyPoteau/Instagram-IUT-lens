<?php 
require_once 'application/helpers/queries/user.php';

$check = compte_existant($email,$mdp);

if(is_null($check)){
    header("Location: ".URL_INDEX.'?page=login');
}
else{
if (isset($_POST['remember'])) {
    $token = bin2hex(random_bytes(32));
    setcookie('rememberme', $token, time() + (30 * 24 * 60 * 60), "/"); // 30 jours
    save_remember_token($check['id'], $token); 
    header("Location: ".URL_INDEX);
}
 else {
    
    $_SESSION['user'] = $check;
    header("Location: ".URL_INDEX);
}
}




?>

