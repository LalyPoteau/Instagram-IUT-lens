@extends('templates.notlogged')


@section('content')




<form method="POST" action="{{URL_INDEX}}?action=register" class="form_con">
    <input type="mail" name="email" placeholder = "e-mail" required > 
    <input type="text" name="login" placeholder = "login" required > 
    <input type="password" name="mdp" placeholder = "Mot de passe" required>
    <input type="password" name="mdp_conf" placeholder = "Confirmez votre mot de passe" required>
    <input type = "submit" value = "S'enregistrer">
</fom>


<div class="lien_ins">
<p>Déjà inscrit ?</p> <a href="{{URL_INDEX}}?page=login"> Connectez-vous </a>
</div>



@endsection('content')
