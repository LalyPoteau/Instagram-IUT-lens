<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram</title>

    <link href="{{URL_CSS}}normalize.css" rel="stylesheet">
    <link href="{{URL_CSS}}style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    @stack('css')

    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>


    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

</head>

<body>
  @isset($_SESSION['info'])

  
    <p id="info">{{$_SESSION['info']}}</p>@php unset($_SESSION['info']); @endphp


    
  @endisset

  <div class="banniere">
    <h1 id="logo_app">Instagram</h1>
    <h3>Par MMI Création</h3>
    </div>

    <section class="content">
        @yield('content')
      </section>

    <div class="logo_univ">
        <a href="https://www.iut-lens.univ-artois.fr/" > <img src="{{URL_LOGO}}/logoIUT.png" alt="Logo Université Artois de Lens"> IUT de Lens </a>
        </div>


    </body>
    </html>