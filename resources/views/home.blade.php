@extends('layout.layout')

@section('content')
<div class="jumbotron container">
  <h1 class="display-4">Welcome To Laravel</h1>
  <p class="lead">This is a simple blog site created with Laravel!</p>
  <hr class="my-4">
  <p>If you wanna create new post please log in or create new account.</p>
  
  <a class="btn btn-outline-primary btn-lg" href="/login" >Login</a>
  <a class="btn btn-outline-success btn-lg" href="/register" >Register</a>
  
</div>

@endsection