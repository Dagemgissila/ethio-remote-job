@extends("company.layouts.app")
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center" >
        <div class="col-md-8 p-3 bg-white">
            <div class="" >
                <h2 class="my-4">Change Password</h2>
                <hr>
                @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
               @endif

               @if(session()->has("error"))
               <div class="alert alert-danger" role="alert">
                     {{session("error")}}
                </div>
               @endif
                <form method="POST" action="{{ route('changePassword') }}">
                    @csrf
                    <div class="row g-3 my-3">
                        
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="password" class="form-control"   name="current_password">
                                <label for="email">Current Password</label>
                            </div>
                            <div>
                                @error("current_password")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password"  class="form-control" >
                                <label for="">Password</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation"   class="form-control" >
                                <label for="subject">Confirm Password</label>
                            </div>
                            @error("password_confirmation")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                    
                        
                        <div class="col-4">
                            <button class="btn btn-primary w-100 py-3" type="submit">Change Password</button>
                        </div>
                    </div>
                </form>
             
            </div>
        </div>
    </div>
</div>
@endsection