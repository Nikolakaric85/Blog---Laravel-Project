@extends ('home')

@section('content') 

<div class="container col-5">
  <form method="post" action="{{route('store')}}" enctype="multipart/form-data">
  @csrf
                    
          <div class="form-group">
              <label for="title">Post title</label>
              <input name="title" id="title" class="form-control" value="{{old('title')}}" style=" @error('title') border-color: red @enderror" />
              <span asp-validation-for="title" class="text-danger"></span>
          </div>

              @error('title')
              <p style="color: red">
                {{$message}}
              </p>
              @enderror

          <div class="form-group">
            <label for="body">Post text</label>
            <textarea class="form-control" name="body" aria-label="With textarea" value="{{old('body')}}"  style=" @error('body') border-color: red @enderror" >  </textarea>
          </div>

              @error('body')
              <p style="color: red">
                {{$message}}
              </p>
              @enderror
  
          <div class="input-group mb-3">
            <div class="custom-file">
              <label class="custom-file-label"> Select image</label>
              <input class="custom-file-input" type="file" id="formFile" name="image"/>
            </div>
          </div>

            <div>
              <button type="submit" class="btn btn-outline-primary">Create</button>
            </div>
  </form>
</div>


@endsection