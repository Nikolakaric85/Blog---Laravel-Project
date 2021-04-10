@extends ('home')

@section('content') 

<div class="container col-3">
  <form method="post" action="{{route('register')}}">
  @csrf
                    
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input name="firstname" id="firstname" class="form-control" value="{{old('firstname')}}" style=" @error('firstname') border-color: red @enderror" />
            <span asp-validation-for="FirstName" class="text-danger"></span>
        </div>
                @error('firstname')
                <p style="color: red">
                {{$message}}
                </p>
                @enderror
        
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}" style=" @error('lastname') border-color: red @enderror" />
            <span asp-validation-for="LastName" class="text-danger"></span>
        </div>

        @error('lastname')
        <p style="color: red">
        {{$message}}
        </p>
        @enderror

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" style=" @error('email') border-color: red @enderror"/>
            <span asp-validation-for="Email" class="text-danger"></span>
        </div>

        @error('email')
        <p style="color: red">
        {{$message}}
        </p>
        @enderror

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" style=" @error('password') border-color: red @enderror"/>
            <span asp-validation-for="Password" class="text-danger"></span>
        </div>

        @error('password')
        <p style="color: red">
        {{$message}}
        </p>
        @enderror

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"style=" @error('password_confirmation') border-color: red @enderror" />
            <span asp-validation-for="password_confirmation" class="text-danger"></span>
        </div>

        @error('password_confirmation')
        <p style="color: red">
        {{$message}}
        </p>
        @enderror

        <div>
        <button type="submit" class="btn btn-outline-primary">Register</button>
        </div>
  </form>
</div>


@endsection