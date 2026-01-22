<?php
    require_once 'application/core/database.php';


    //vérifie que le compte existe et récupère les informations
    function compte_existant($email,$mdp){
        $pdo = get_pdo();
        $sql = 'SELECT * FROM user
        WHERE email=?
        AND mdp=SHA1(?)';
        $query = $pdo->prepare($sql);
        $query->execute([$email,$mdp]);
        $result =  $query->fetchAll();
        if (count($result)==1) return $result[0];
        else return NULL;}


        //Vérifie si la personne n'est pas déjà inscrit

    function verif_mail($email){
        $pdo = get_pdo();
        $sql = 'SELECT * FROM user 
        WHERE email= ?';
        $query = $pdo->prepare($sql);
        $query->execute([$email]);
        $result =  $query->fetchAll();
        if (count($result)==1) return $result[0];
        else return NULL;}


        //inscription

    function inscription($login, $mdp, $email){
        $pdo = get_pdo();
        $sql ='INSERT INTO user (login, mdp, email) 
        VALUES (?, sha1(?), ?)';
        $query = $pdo->prepare($sql);
        if (!$query->execute([$login,$mdp,$email])) return NULL;
        return $pdo->lastInsertId();
    }

    function save_remember_token($userId, $token) {
    $pdo = get_pdo();
    $sql = "UPDATE user SET remember = ? WHERE id = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$token, $userId]);
    }

    function get_user_by_token($token){
    $pdo = get_pdo();
    $sql = "SELECT * FROM user WHERE remember= ?";
    $query = $pdo->prepare($sql);
    $query->execute([$token]);
    $result = $query->fetch();
    return $result ? $result : null;
    }

    function delete_remember_token($userId){
        $pdo = get_pdo();
        $sql = "UPDATE user SET remember = NULL WHERE id = ?";
        $query = $pdo->prepare($sql);
        $query->execute([$userId]);
    }

    function search_user($iduser,$login){
        $pdo = get_pdo();
        $sql = 'select user.id, user.login, t.dateAbonnement, t.idAbonne 
        from user 
        left join (select * from friend where idAbonne=?) as t on user.id=t.idAmi
        where user.login like ? and user.id != ?';
        $query = $pdo->prepare($sql);
        $query->execute([$iduser,"%$login%", $iduser]);
        return $query->fetchAll();
    }

    function get_friends($iduser){
        $pdo = get_pdo();
        $sql = 'select user.id,user.login,friend.dateAbonnement 
        from friend 
        inner join user on user.id=friend.idAmi 
        where friend.idAbonne = ?';
        $query = $pdo->prepare($sql);
        $query->execute([$iduser]);
        return $query->fetchAll();
}

    function add_friend($idabonne,$idami){
        $pdo = get_pdo();
        $sql = 'insert into friend (idAbonne, idAmi, dateAbonnement) 
        values (?, ?, NOW())';
        $query = $pdo->prepare($sql);
        if (!$query->execute([$idabonne,$idami])) return NULL;
        return $pdo->lastInsertId();
    }

    function del_friend($idabonne, $idami){
        $pdo = get_pdo();
        $sql = 'delete from friend where idAbonne=? and idAmi=?';
        $query = $pdo->prepare($sql);
        if (!$query->execute([$idabonne,$idami])) return NULL;
        return $pdo->lastInsertId();
    }

    function check_friends($idabonne, $idami){
        $pdo = get_pdo();
        $sql = '
        SELECT * from friend where idAbonne=? and idAmi=?';
        $query = $pdo->prepare($sql);
        $result =  $query->fetchAll();
        $query->execute([$idabonne,$idami]);
        if (count($result)==1) return "test";
        else return "NULL";
    }


?>