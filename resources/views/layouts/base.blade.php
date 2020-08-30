<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TMDB</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">TMDB API Request</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <form class="ml-auto" method="GET" action="{{ url("search/") }}">
            <input type="text" placeholder="Busque por filmes!" name="query">
            <button type="submit"><i class="fa fa-search"></i></button>
          </form>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
      Categorias
    <nav class="nav">
        @foreach ($menuGenres['genres'] as $genre)
            <a class="nav-link" href="{{ url('genre/'.$genre['id'])}}">{{ $genre['name'] }}</a>
        @endforeach
      </nav>
    @yield('content')
  </div>
</body>

</html>
