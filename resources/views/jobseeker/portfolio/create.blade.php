@extends("jobseeker.layouts.app")
@section("content")
<div class="container">
    <div class="row">
        
        <div class="col-md-8 card p-4">
        <h2>Add Portfolio</h2>
        @if(session()->has("success"))
                    <div class="alert alert-success" role="alert">
                           {{session("success")}}
                    </div>
                    @endif
        <hr>
            <form action="{{route('jobseeker.addportfolio')}}" method="POST" enctype="multipart/form-data">
             @csrf
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                   <label for="exampleTextarea1">Portfolio Title</label>
                                      <input type="text" name="title" value="{{old('title')}}" required class="form-control">
                              </div>

                              @error("title")
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                        </div>


                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="exampleTextarea1">Link</label>
                                   <input type="url" name="link" value="{{old('link')}}" class="form-control">
                           </div>
                           @error("link")
                                    <span class="text-danger">{{$message}}</span>
                              @enderror
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="exampleTextarea1">Image (select maximum 5 images)</label>
                        <input type="file" name="image[]" multiple accept=".png, .jpg, .jpeg" class="form-control">
                      </div>
                      @error("image")
                                    <span class="text-danger">{{$message}}</span>
                         @enderror

                      <div class="form-group">
                        <label for="exampleTextarea1"> Desciption</label>
                        <textarea
                          class="form-control"
                          name="description"
                          rows="4"
                        
                          required
                        >{{old('description')}}</textarea>
                      </div>
                      @error("description")
                                    <span class="text-danger">{{$message}}</span>
                         @enderror
                      <button type="submit" class="btn btn-primary m-1"> Submit </button>
            </form>
        </div>
    </div>
</div>

@endsection