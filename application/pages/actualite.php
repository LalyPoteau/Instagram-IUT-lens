<?php

require_once 'application/helpers/queries/articles.php';

$iduser = $_SESSION['user']['id'];
$affichage = affichage_actu($iduser); //Array ( [0] => Array ( [id] => 15 [titre] => rêvasse [dateEcrit] => 2025-05-07 10:25:22 [img_url] => img/17466063225IMG-20250421-WA0011.jpg [idAuteur] => 5 [tags] => #cosplay #emmasano #pascours #fleur [login] => seb ) [1] => Array ( [id] => 14 [titre] => shy [dateEcrit] => 2025-05-07 09:26:36 [img_url] => img/17466027965ShyLovecursedemoji.png [idAuteur] => 5 [tags] => #tresserieux #gpasdidee #rendezmoimontemps [login] => seb )
$menu = 1;

echo $blade->run("actualite",compact('affichage', 'menu'));

?>