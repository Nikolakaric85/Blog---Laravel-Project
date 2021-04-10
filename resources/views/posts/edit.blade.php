@extends ('home')

@section('content') 

<div class="container col-5">
  <form method="POST" action="{{route('update',$posts->id)}}" enctype="multipart/form-data">
    
    @csrf
    @method('PUT')
        
        <img src="/storage/images/{{$posts->image}}" class="img-fluid mb-3" alt="...">
        
            <div class="form-group">
                <label for="title">Post title</label>
                <input name="title" id="title" class="form-control" value="{{$posts->title}}" required />
                <span asp-validation-for="title" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="body">Post text</label>
                <textarea class="form-control" name="body" aria-label="With textarea">{{$posts->body}} </textarea>
            </div>

                
            <div class="input-group mb-3">
              <div class="custom-file">
                  <label class="custom-file-label"> Select image</label>
                  <input class="custom-file-input" type="file" id="formFile" name="image"/>
              </div>
            </div>

          
            <div class="row">
              <div class="col">
                <button type="submit" class="btn btn-outline-primary">Update</button>                          
              </div>
            </div>
                    
   </form>
</div>
<br>
<br>

@endsection



