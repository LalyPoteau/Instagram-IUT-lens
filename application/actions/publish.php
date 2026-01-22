<?php

require_once 'application/helpers/queries/articles.php';


$iduser = $_SESSION["user"]["id"];

$field = [
    "options" => [
        "regexp" => "/^#[a-z0-9_]+(( )+#[a-z0-9_]+)*( )*$/"
    ]
];

if($_FILES['photos']['error'] == 0){
    if(!filter_var($tags,FILTER_VALIDATE_REGEXP,$field)){
        header("Location: ".URL_INDEX. '?page=publish');
    }
    else{
    $a = time();
    $b = $_SESSION["user"]["id"];
    $c = $_FILES['photos']['name'];
    $nom = $a . $b . $c;
    move_uploaded_file($_FILES['photos']['tmp_name'], "public/img/$nom");
    $photo_url = "img/$nom";
    publication($titre,$photo_url, $iduser, $tags);
    header("Location: ".URL_INDEX);}
}

else{
    header("Location: ".URL_INDEX. '?page=publish');
}





?>