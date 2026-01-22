@section('main_top')

@endsection('main_top')

@extends('templates.app')


@section('content')



<div class="head_pub">
<p> Une inspiration, une humeur ? </p>
    <h3>Partagez </h3>
</div>

<form method="POST" action="{{URL_INDEX}}?action=publish" class="form_con" enctype="multipart/form-data">
<input type="text" name="titre" placeholder ="Titre de la publication">
<label for="photos" class="photos"><i class='bx bx-upload'></i> Charger une image</label>
<input type="file" id="photos" name="photos" value = "Charger une image" accept="image/*">
<input type="text" name="tags" placeholder ="tags" pattern="^#[a-z0-9_]+(( )+#[a-z0-9_]+)*( )*$">
<input type = "submit" value = "Publier">
</form>




@endsection('content')