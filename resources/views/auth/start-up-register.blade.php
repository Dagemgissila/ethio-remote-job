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

                        
                        <h5>Description</h5>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a description here" id="message" style="min-height: 150px"></textarea>
                                <label for="message">a brief description of your products, services, or solutions</label>
                            </div>

                            <div>
                                @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <h5> Founders and Leadership Team</h5>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a description here" id="message" style="min-height: 150px"></textarea>
                                <label for="message">Share the names and roles of the founders and key members of your startup's leadership team.</label>
                            </div>

                            <div>
                                @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <span class="font-weight-bold"> Business Plan and Growth Strategy(Optional)</span>
                        
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a description here" id="message" style="min-height: 150px"></textarea>
                                <label for="message">Provide a summary of your business plan and growth strategy, including your short-term and long-term goals</label>
                            </div>

                            <div>
                                @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
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


