<?php
require_once 'application/helpers/queries/user.php';

$check = verif_mail($email);



if(is_null($check)){
    if($mdp == $mdp_conf){
    // $email ," ", $login, " ", $mdp," ", $mdp_conf; => seb seb@gmail.com 123 123
    inscription($login, $mdp, $email);
    header("Location: ".URL_INDEX);

}
else {
    $_SESSION["info"] ="Vos mot de passes en correspondent pas";
    header("Location: ".URL_INDEX.'?page=register');
}
}
else{
    
    $_SESSION["info"] ="Vous avez déjà un compte pré-existant";
    header("Location: ".URL_INDEX.'?page=login');
}


?>

