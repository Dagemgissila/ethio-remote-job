@extends("jobseeker.layouts.app")
@section("content")
<div class="row d-flex justify-content-center  shadow align-items-center" >
        <div class="col-md-12 p-5 bg-white">
            <div class="" >

            @if(session()->has("success"))
              <div class="bg-success text-white p-2">
                   {{session("success")}}
              </div>
            @endif
                
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
                <form method="POST" action="{{ route('editprofile') }}" enctype="multipart/form-data">
                    @csrf
                 
                    <div class="row g-3 my-1">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{$profile->firstname}}"  name="firstname">
                                <label for="">First Name</label>
                            </div>
                            <div>
                                @error("firstname")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          
                        </div>
                        <div class="col-4">
                            <div class="form-floating">
                                <input type="text" name="lastname" value="{{$profile->lastname}}"  class="form-control">
                                <label for="">Last Name</label>
                            </div>
                            @error("lastname")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-4">
                            <div class="form-floating">
                                <input type="number" name="phone_number" value="{{$profile->phone_number}}"  class="form-control">
                                <label for="">Phone Number</label>
                            </div>
                            @error("deadline")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-1">
                        @if ($profile->profile_image)
    <div class="rounded-circle" style="width: 100px; height: 100px; overflow: hidden;">
        <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Picture" width="100">
    </div>
@else
    <p>no profile picture</p>
@endif
                        </div>

                        <div class="col-5">
                            <div class="form-floating">
                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" value="{{$profile->profile_image}}"  class="form-control">
                                <label for="">Profile Picture</label>
                            </div>
          
                            @error("profile_image")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
 
        
                        <input type="hidden" name="old_picture" value="{{$profile->profile_image}}">

                        <div class="col-6">
                            <div class="form-floating ">
                                <input type="file" name="resume" accept=".pdf" value="{{$profile->resume}}"  class="form-control ">
                                <label for="" class="">Resume</label>
                            </div>
                            @if ($profile->resume)
                                  <a href="{{ asset('storage/' . $profile->resume) }}" target="_blank">Download Resume</a>
                            @endif

                            @error("resume")
                                   <span class="text-danger">{{$message}}</span>
                           @enderror
                        </div>

                        <input type="hidden" name="old_resume" value="{{$profile->resume}}">

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="about_me" style="min-height: 150px">{{$profile->about_me}}</textarea>
                                <label for="">About me</label>
                            </div>

                            <div>
                                @error("about_me")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                     
                     
                        <div class="col-3">
                            <button class="btn btn-primary w-100 p-3" type="submit">Save Changes </button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
@endsection
