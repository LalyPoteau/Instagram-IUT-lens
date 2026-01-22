<?php

require_once 'application/helpers/queries/user.php';

$iduser = $_SESSION['user']['id'];

$Userfriends = get_friends($iduser);
 // ( [0] => Array ( [id] => 1 [dateAbonnement] => 0000-00-00 00:00:00 [idAbonne] => 1 [idAmi] => 5 ) [1] => Array ( [id] => 2 [dateAbonnement] => 0000-00-00 00:00:00 [idAbonne] => 5 [idAmi] => 2 ) )
foreach ($Userfriends as &$info) {
    if ($info['dateAbonnement'] && $info['dateAbonnement'] !== "0000-00-00 00:00:00") {
        $date = new DateTime($info['dateAbonnement']);
        $info['dateAbonnement'] = $date->format('j F, Y');
    } else {
        $info['dateAbonnement'] = '';
    }
}



if (isset($nom)){
    $Usersearch = search_user($iduser, $nom); //  ( [0] => Array ( [id] => 2 [login] => IUT Lens [mdp] => 40bd001563085fc35165329ea1ff5c5ecbdbbeef [email] => iut@univ-artois.fr [remember] => [avatar] => ) )
    foreach ($Usersearch as &$info) {
    if ($info['dateAbonnement'] && $info['dateAbonnement'] !== "0000-00-00 00:00:00") {
        $date = new DateTime($info['dateAbonnement']);
        $info['dateAbonnement'] = $date->format('j F, Y');
    } else {
        $info['dateAbonnement'] = '';
    }
}

    echo $blade->run("subscription",compact('Usersearch','Userfriends', 'nom'));
}
else{
    echo $blade->run('subscription',compact('Userfriends'));
}



?>