@extends('layouts.app')
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center" >
        <div class="col-md-6 my-5  p-5 bg-white">
            <div class="" >
                <h2 class="my-4">Sign In</h2>
                <hr>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
                <form method="POST" action="{{ route('login') }}">
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
                                <input type="password" name="password" value="{{old('password')}}"  class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Password</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input blue-checkbox" type="checkbox" id="remember" name="remember" >
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <button class="btn btn-secondary w-100 py-2" type="submit">Login</button>
                        </div>
                    </div>
                </form>
                <div class="text-secondary">
                    <a href="{{route('password.request')}}" class="text-secondary">Forget Password ?</a>
                  
                </div>
                <div class="my-2">
                    <span>You dont have account yet?</span>
                    <br>
                    <a href="{{route('register')}}" class="text-secondary"> Register Here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


