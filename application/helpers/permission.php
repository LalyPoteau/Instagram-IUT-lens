<?php

function estConnecte(){
if(is_null($_SESSION['user'])){
    return null;
}
else {
    return 1;
}
}

function estConnecteOuRedirection($url,$message = NULL){

}
