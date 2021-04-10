@extends ('home')

@section('content') 
<div class="container col-3">
<form action="{{route('login')}}" method="post" >
@csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" style=" @error('email') border-color: red @enderror" id="email" name="email" aria-describedby="emailHelp" value="{{old('email')}}">
    <div id="emailHelp" class="form-text"></div>
  </div>

  @error('email')
  <p style="color: red">
    {{$message}}
  </p>
  @enderror

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" style=" @error('email') border-color: red @enderror">
  </div>
  @error('password')
  <p style="color: red">
    {{$message}}
  </p>
@enderror
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" class="btn btn-outline-primary">Login</button>
</form>
</div>


@endsection