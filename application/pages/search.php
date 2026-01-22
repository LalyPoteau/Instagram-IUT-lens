<?php

require_once 'application/helpers/queries/articles.php';


if (!isset($tags) && !isset($search)) {
    echo $blade->run("search");
}
else{
    $articles_rechercher = affichage_par_tag($tags);
    foreach($articles_rechercher as $article => $info){
$img = explode("/", $info['img_url']);

$info['img_url'] = $img[1];

}
$menu = 2;

echo $blade->run("search",compact('articles_rechercher','tags', 'menu'));
}


?>