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

  @section('topMenu')
  <nav class="menu_top"> 
    <h2>Instagram</h2>
    <a href="{{URL_INDEX}}?page=subscription"> <i class='bx bxs-user-plus' ></i> </a>
    <a href="{{URL_INDEX}}?page=publish"> <i class='bx bxs-paper-plane' ></i> </a>
  </nav>
@show
  

  


  <section class="content">
    @yield('content')
  </section>

<nav class="menu_bot">
  
  <a href="{{URL_INDEX}}" class="{{ (empty($_GET['page']) || $_GET['page'] === 'actualite') ? 'active' : '' }}">
  <i class='bx bx-home'></i> </a>
  <a href="{{URL_INDEX}}?page=search" class="{{ (isset($_GET['page']) && $_GET['page'] === 'search') ? 'active' : '' }}"><i class='bx bx-search' ></i> </a>
  <a href="{{URL_INDEX}}?page=article" class="{{ (isset($_GET['page']) && $_GET['page'] === 'article' && !isset($_GET['id'])) ? 'active' : '' }}"><i class='bx bx-user'> </i> </a>
  <a href="{{URL_INDEX}}?action=logout"> <i class='bx bx-log-out-circle'></i> </box-icon> </a>
</nav>


</body>
</html>
