@section('main_top')

@endsection

@extends('templates.app')


@section('content')

@foreach($articles as $article => $info)
<div class="publication">
<span> <a href="{{URL_INDEX}}?page=article&id={{$info['idAuteur']}}">{{$info['login']}}</a></span>
<img src="{{URL_PUBLIC}}{{$info['img_url']}}">
<h3>{{$info['titre']}}</h3>
</div>
<div class="description_publication">
<span>{{$info['tags']}}</span>
<i class='bx bx-message-rounded-dots' ></i>
<i class='bx bx-heart'></i>

</div>
@endforeach


@endsection('content')
