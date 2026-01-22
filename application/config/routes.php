<?php
require_once 'application/core/routing.php';

// Configuration des routes, c'est à dire l'association entre les pages demandées
// et le code php à exécuter

// Le premier paramètre indique le fichier php à exécuter. Par exemple,
// index correspond à pages/index.php


// Les paramètres suivants indiquent les éventuels valeurs attendues et si il s'agit de GET ou POST
// Le fichier php correspondant n'est lancé que si tous les paramètres
// existent. Les paramètres validés sont automatiquement convertis
// en variables php de même nom
// Seule l'existence des paramètres est testée, pas leur valeur (c'est donc à vous de le faire)


add_page('index');
add_page('page2',['id' => GET]); 
add_page('login');
add_page('register');
add_page('publish');
add_page('search', ['tags?' => GET]); 
add_page('article', ['id?' => GET]);
add_page('subscription', ['nom?' => GET]);
add_page('actualite');


//séparation action car sinon je sais pas m'organiser

add_action('login', ['email' => POST, 'mdp' => POST, 'remember?' => POST]); // 'remember' => POST
add_action('register', ['email' => POST,'login' => POST, 'mdp' => POST, 'mdp_conf' => POST]);
add_action('logout');
add_action('publish', ['titre' => POST, 'photos?' => POST, 'tags' => POST]);
add_action('addFriend', ['id' => GET]);
add_action('delFriend', ['id' => GET]);