@extends ('home')

@section('content') 

<div class="card mb-3 container" >
  <div class="row g-0">
    <div class="col-md-3">
      <img width="50%" src="/storage/images/{{$post->image}}" alt="{{$post->image}}">
    </div>
    <div class="col-md-8">
      <div class="card-body">

        @if (Auth::user()->role_id == 1)
        <h5><a href=""  role="button">{{$post->title}}</a></h5>  
        @else
        <h5><a href="{{ route('edit',$post->id)}}"  role="button">{{$post->title}}</a></h5>
        @endif
        <p class="card-text">{{$post->body}}.</p>
        <p class="card-text"><small class="text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</small></p>
      </div>
            <div>
            <form action="{{route('destroy',$post)}}" method="POST" class="mx-3">
              @if (Auth::user()->role_id == 2)
                <a class="btn btn-outline-primary ms-1" href="{{route('edit',$post->id)}}">Edit</a> 
                @endif
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger ms-30">Delete</button>
              </form>
              <br>
              
            </div>
    </div>
  </div>
</div>

@endsection


