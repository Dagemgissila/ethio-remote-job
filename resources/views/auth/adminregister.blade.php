@extends('layouts.app')
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center" >
        <div class="col-md-6 my-5  p-5 bg-white">
            <div class="" >
                <h2 class="my-4">Admin Registration</h2>
                <hr>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
                <form method="POST" action="{{ route('adminRegister') }}">
                    @csrf
                    <div class="row g-3 my-3">
                    
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('email')}}"  name="email" id="email" placeholder="Your Email">
                                <label for="email">Your Email</label>
                            </div>
                            <div>
                                @error("email")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password"   class="form-control" id="subject" placeholder="password">
                                <label for="">Password</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation"  class="form-control" id="subject" placeholder="confirm password">
                                <label for="">Confirm Password</label>
                            </div>
                            @error("confirm_password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                       
                        <div class="col-4">
                            <button class="btn btn-secondary w-100 py-2" type="submit">Login</button>
                        </div>
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</div>
@endsection


