<?php
require_once 'application/helpers/queries/user.php';



if(isset($_GET['id'])){

$iduser= $_SESSION['user']['id'];
$idami = $_GET['id'];

del_friend($iduser, $idami);

    header("Location: ".URL_INDEX. '?page=subscription');
}


else{
    header("Location: ".URL_INDEX. '?page=subscription');
}
?>