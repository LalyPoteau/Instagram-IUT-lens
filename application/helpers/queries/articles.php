<?php
    require_once 'application/core/database.php';

    function publication($titre,$photo_url, $iduser, $tags){
        $pdo = get_pdo();
        $sql ='INSERT INTO article (titre, dateEcrit, img_url, idAuteur, tags)
                VALUES (?, now(), ?, ?, ?);';
        $query = $pdo->prepare($sql);
        if (!$query->execute([$titre,$photo_url, $iduser, $tags])) return NULL;
        return $pdo->lastInsertId();
    }


    function affichage_par_id($idauteur){
    $pdo = get_pdo();
    $sql = 'select article.*,user.login from article 
    inner join user on user.id = article.idAuteur 
    where idAuteur=? order by dateEcrit desc';
    $query = $pdo->prepare($sql);
    $query->execute([$idauteur]);
    return $query->fetchAll();}


    function affichage_par_tag($tag){
        $pdo = get_pdo();
        $sql = 'select article.*,user.login from article 
        inner join user on user.id = article.idAuteur 
        where article.tags LIKE  ?  order by dateEcrit desc';
        $query = $pdo->prepare($sql);
        $query->execute(["%$tag%"]);
        return $query->fetchAll();}
    

        function affichage_actu($iduser){
        $pdo = get_pdo();
        $sql = 'select article.*,user.login from article
        inner join user on user.id = article.idAuteur
        where idAuteur in (SELECT friend.idAmi FROM friend where idAbonne=? UNION select ?) AND NOT idAuteur = ?
        order by dateEcrit desc;
;';
        $query = $pdo -> prepare($sql);
        $query->execute([$iduser,$iduser,$iduser]);
        return $query->fetchAll();}
    

?>

//