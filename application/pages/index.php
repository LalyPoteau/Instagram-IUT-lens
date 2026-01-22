<?php
require_once 'application/helpers/queries/user.php';
if (!isset($_SESSION['user']) && isset($_COOKIE['rememberme'])) {
    $user = get_user_by_token($_COOKIE['rememberme']); // À implémenter
    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: ".URL_INDEX.'?page=actualite');
   }

}
elseif(isset($_SESSION['user'])){
    header("Location: ".URL_INDEX.'?page=actualite');
}
else{
      echo $blade->run("login");
}






?>
