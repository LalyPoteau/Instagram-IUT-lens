@section('main_top')

@endsection

@extends('templates.app')


@section('content')

<div class = "actu">
@foreach($affichage as $article=>$info)
<div class = "article_actu">
    
<a href="{{URL_INDEX}}?page=article&id={{$info['idAuteur']}}">
<p>{{$info['login']}}</p>
<img src="{{URL_PUBLIC}}{{$info['img_url']}}">
</a>
</div>

@endforeach
</div>

@endsection('content')
