<?php
require_once 'application/helpers/queries/user.php';
if(isset($_GET['id'])){

$iduser= $_SESSION['user']['id'];
$idami = $_GET['id'];
$friend = check_friends($iduser, $idami);

if(!isset($friend)){

header("Location: ".URL_INDEX. '?page=subscription');
}

else {

    add_friend($iduser,$idami);
    header("Location: ".URL_INDEX. '?page=subscription');
}
        
    
}


else{
    header("Location: ".URL_INDEX. '?page=subscription');
}


?>