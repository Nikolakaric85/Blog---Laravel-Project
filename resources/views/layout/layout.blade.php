<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <title>Blog</title>
</head>
<body>
  
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 container">
    <a class="navbar-brand" href="{{ route('posts')}}">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('posts')}}">Home</span></a>
        </li>
     
        @auth
        <li class="nav-item">
          <a class="nav-link" href="#">{{auth()->user()->name}}</a>
        </li>
        <li class="nav-item">
            <form action="{{ route('logout')}}" method="post" >
        @csrf
        <button type="submit" class="nav-link btn btn-light"  style="padding-top: 10%">Logout</button>
        </form>
        </li>
        @endauth
  
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login')}}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register')}}">Register</a>
        </li>
  
        @endguest
      </ul>
    </div>
  </nav>
  
  @yield('content')


</body>
</html>







