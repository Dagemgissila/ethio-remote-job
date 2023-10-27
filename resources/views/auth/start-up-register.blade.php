@extends('layouts.app')
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center" >
        <div class="col-md-6 my-5  p-5 bg-white">
            <div class="" >
                <h2 class="mb-4">Register Us Start up</h2>
                <hr>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
                <form method="POST" action="{{route('register.startup')}}">
                    @csrf
                    <div class="row g-3 my-3">
                          @if($errors->has("error"))
                                  <div class="bg-danger p-2 text-white">
                                     {{$errors->first("error")}}
                                  </div>
                          @endif

                          @if(session()->has("success"))
                                <div class="alert alert-success" role="alert">
                                       {{session("success")}}
                                </div>
                          @endif
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('founder_name')}}"  name="founder_name" >
                                <label for="founder_name"> Founder Name</label>
                            </div>
                            <div>
                                @error("founder_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('email')}}"  name="email">
                                <label for="email"> Email</label>
                            </div>
                            <div>
                                @error("email")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('address')}}"  name="address">
                                <label for=""> Start Up address</label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" value="{{old('phone_number')}}"  name="phone_number">
                                <label for=""> Phone number</label>
                            </div>
                            <div>
                                @error("phone_number")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('business_name')}}"  name="business_name">
                                <label for=""> Busines name</label>
                            </div>
                            <div>
                                @error("business_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="description"  style="min-height: 150px">{{old("description")}}</textarea>
                                <label for="message">Brief description of the startup</label>
                            </div>

                            <div>
                                @error("description")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <h5>Social media presence /Optional</h5>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" value="{{old('linkdelin')}}"  name="linkdelin" >
                                <label for=""> LinkedIn profile</label>
                            </div>
                            <div>
                                @error("linkdelin")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" value="{{old('telegram')}}"  name="telegram" >
                                <label for=""> Telegram channel/group</label>
                            </div>
                            <div>
                                @error("telegram")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="website" class="form-control" value="{{old('facebook')}}"  name="facebook">
                                <label for=""> Facebook page </label>
                            </div>
                            <div>
                                @error("facebook")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" name="password" value="{{old('password')}}"  class="form-control" >
                                <label for="subject">Password</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}"  class="form-control" >
                                <label for="">Confirm Password</label>
                            </div>
                            @error("password_confirmation")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input blue-checkbox" required type="checkbox" id="remember" name="remember" >
                                <label class="form-check-label" for="remember">i agree to <a href="/Terms-of-service-and-policies" class="text-secondary">Terms of service and policies</a></label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button class="btn btn-secondary w-100 py-2" type="submit">Register</button>
                        </div>
                    </div>
                </form>

                <div class="my-2">
                    <span>Already have account ?</span>

                    <a href="{{route('login')}}" class="text-secondary">Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


