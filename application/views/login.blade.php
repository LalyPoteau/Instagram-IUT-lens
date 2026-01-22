@extends('templates.notlogged')


@section('content')



<form method="POST" action="{{URL_INDEX}}?action=login" class="form_con">
    <input type="mail" name="email" placeholder = "e-mail" required > 
    <input type="password" name="mdp" placeholder = "Mot de passe" required>
    <div>
    <input type="checkbox" id="remember" name="remember" >
    <label for="remember">Se souvenir de moi</label>
</div>
    <input type = "submit" value = "Connexion">
</form>


<div class="lien_ins">
<p>Vous n'avez pas de compte ? <a href="{{URL_INDEX}}?page=register"> Inscrivez-vous </a> </p>
</div>


@endsection('content')
