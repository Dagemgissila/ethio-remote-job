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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row g-3 my-3">

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('founder_name')}}"  name="founder_name" id="founder_name" placeholder="founder name">
                                <label for="founder_name"> Founder Name</label>
                            </div>
                            <div>
                                @error("email")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('email')}}"  name="email" id="email" placeholder="Your Email">
                                <label for="email"> Email</label>
                            </div>
                            <div>
                                @error("email")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('address')}}"  name="address" id="location" placeholder="Yo">
                                <label for="email"> Start Up address</label>
                            </div>
                            <div>
                                @error("email")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" value="{{old('location')}}"  name="location" id="location" placeholder="Yo">
                                <label for="email"> Phone number</label>
                            </div>
                            <div>
                                @error("email")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('company_name')}}"  name="company_name" id="company_name" placeholder="Your Email">
                                <label for="company_name"> Busines name</label>
                            </div>
                            <div>
                                @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                           
                        </div>

                    

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a description here" id="message" style="min-height: 150px"></textarea>
                                <label for="message">Brief description of the startup</label>
                            </div>

                            <div>
                                @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <h5>Social media presence /Optional</h5>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="website" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                                <label for=""> LinkedIn profile</label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="website" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                                <label for=""> Telegram channel/group</label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="website" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                                <label for=""> Facebook page </label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" name="password" value="{{old('password')}}"  class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Password</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" name="confirm" value="{{old('password')}}"  class="form-control" id="subject" placeholder="Subject">
                                <label for="subject">Confirm Password</label>
                            </div>
                            @error("password")
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


