@extends ('home')

@section('content') 

@if (Auth::check())

    @if (Auth::user()->role_id == 2)
      <div class="container-sm">
        <a type="button" class="btn btn-outline-primary mb-4" href="{{ route('create')}}">Create Post</a>
      </div>  
    @endif

@endif


@if ($posts->count())
<div class="container-sm">
@foreach ( $posts as $post )

<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-3">
      <img width="50%" src="/storage/images/{{$post->image}}" alt="{{$post->image}}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5><a href="{{ route('show',$post->id)}}" role="button">{{$post->title}}</a></h5>
        <p class="card-text">{{$post->body}}</p>
        <p class="card-text"><small class="text-muted">Written on {{$post->created_at}} by {{$post->user->name}}</small></p>
       
        
        <form method="post"  action="{{route('approved',$post->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

        @if (Auth::check())

          @if (Auth::user()->role_id == 1)

              @if ($post->approved==1)
              <div class="form-check p-0">
                <input  type="checkbox" id="check"  name="check" value="true" checked  >
                <label class="form-check-label" for="check">Approved</label>
                <button class="btn btn-outline-primary" type="submit">Save</button>
              </div>
              @else
              <div class="form-check p-0">
                <input  type="checkbox" id="check"  name="check"    >
                <label class="form-check-label" for="check">Approved</label>
                <button class="btn btn-outline-primary" type="submit">Save</button>
              </div>
              @endif
          @endif
        @endif
            
        </form>
       
      </div>
    </div>
  </div>
</div>

@endforeach
   
@endif

</div>
@endsection

