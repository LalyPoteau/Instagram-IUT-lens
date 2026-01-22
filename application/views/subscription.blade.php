
@section('topMenu')

<form method="GET" action="{{URL_INDEX}}" class="form_search" >
    <input type="hidden" name="page" value="subscription">
    @if(!empty($nom))
<input type="text" name="nom" placeholder ="Votre recherche" value={{$nom}}>

    @else
        <input type="text" name="nom" placeholder ="Votre recherche">
    
    @endif
<button type="submit" class="btn-search">
<i class='bx bx-search'></i>
</button>
</form>



@endsection
@extends('templates.app')


@section('content')
<div class="utilisateurs">

@if(!empty($Usersearch))


<h2>Ma recherche</h2>
@foreach($Usersearch as $personnes => $info)
<div class="user">
<span> <a href="{{URL_INDEX}}?page=article&id={{$info['id']}}" class="friend">
    {{$info['login']}}</a>
@if(!empty($info['idAbonne']))
</br>depuis le {{$info['dateAbonnement']}}</span>
<a href="{{URL_INDEX}}?action=delFriend&id={{$info['id']}}" class = "button_friend"> 
    se désabonner </a>


@else
</span>
<a href="{{URL_INDEX}}?action=addFriend&id={{$info['id']}}" class = "button_friend"> s'abonner </a>


@endif

</div>
@endforeach

@else

<p> Aucun comptes ne correspond à vos recherches</p>

@endif

<h2>Mes abonnements</h2>
@foreach($Userfriends as $personnes => $info)


<div class="user">
<span> <a href="{{URL_INDEX}}?page=article&id={{$info['id']}}" class="friend">{{$info['login']}}</a> </br>depuis le {{$info['dateAbonnement']}}</span>
<a href="{{URL_INDEX}}?action=delFriend&id={{$info['id']}}" class = "button_friend"> se désabonner </a>
</div>
@endforeach

</div>
@endsection

