
@section('topMenu')


<form method="GET" action="{{URL_INDEX}}" class="form_search" >
    <input type="hidden" name="page" value="search">
    @if(!empty($tags))
<input type="text" name="tags" placeholder ="Votre recherche" value='{{$tags}}'>
    @else
<input type="text" name="tags" placeholder ="Votre recherche">
    @endif
<button type="submit" class="btn-search">
<i class='bx bx-search'></i>
</button>
</form>



@endsection
@extends('templates.app')


@section('content')


@if(!empty($articles_rechercher))
@foreach($articles_rechercher as $article => $info)
<div class="publication">
    <a href="{{URL_INDEX}}?page=article&id={{$info['idAuteur']}}">
<span> {{$info['login']}}</span>
<img src="{{URL_PUBLIC}}{{$info['img_url']}}">
<h3>{{$info['titre']}}</h3>
</a>
</div>
<div class="description_publication">
<span>{{$info['tags']}}</span>
<i class='bx bx-message-rounded-dots' ></i>
<i class='bx bx-heart'></i>

</div>
@endforeach


@else

<p id="no_info"> Aucune publication ne correspond à vos recherches</p>

@endif

@endsection