<?php

require_once 'application/helpers/queries/articles.php';

if (isset($id)){
    $articles = affichage_par_id($id);
    //foreach($articles as $article => $info) => ( [id] => 14 [titre] => shy [dateEcrit] => 2025-05-07 09:26:36 [img_url] => img/17466027965ShyLovecursedemoji.png [idAuteur] => 5 [tags] => #tresserieux #gpasdidee #rendezmoimontemps [login] => seb )
    foreach($articles as $article => $info){
    $img = explode("/", $info['img_url']);
    
    $info['img_url'] = $img[1];
    
    }
    $menu = 0;

}

else{
$articles = affichage_par_id($_SESSION["user"]["id"]);
//foreach($articles as $article => $info) => ( [id] => 14 [titre] => shy [dateEcrit] => 2025-05-07 09:26:36 [img_url] => img/17466027965ShyLovecursedemoji.png [idAuteur] => 5 [tags] => #tresserieux #gpasdidee #rendezmoimontemps [login] => seb )
foreach($articles as $article => $info){
$img = explode("/", $info['img_url']);

$info['img_url'] = $img[1];

}
$menu = 3;
}



echo $blade->run("article",compact('articles', 'menu'));
?>