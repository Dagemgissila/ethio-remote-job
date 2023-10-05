@extends('layouts.app')
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center " >
        <div class="col-md-8 my-5  p-3 bg-white">
            <div class="" >
                <h2 class="my-4">Register Us Licenced Company</h2>
                <hr>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row g-3 my-3">
                       <h5>Company information </h5>
                       <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('company_name')}}"  name="company_name" id="company_name" placeholder="Your Email">
                                <label for="company_name"> Company Name</label>
                            </div>
                            <div>
                                @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>
                        
            

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="file" class="form-control" value="{{old('fiel')}}"  name="logo" id="logo" placeholder="logo">
                                <label for="email"> Company Logo</label>
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
                                <input type="text" name="industry" value="{{old('password')}}"  class="form-control" id="industry" placeholder="industry">
                                <label for="industry">Industry/Field
                                    
                                </label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="date" class="form-control" value="{{old('email')}}"  name="year" id="year" placeholder="Established Year">
                                <label for="year"> Established Year</label>
                            </div>
                            <div>
                                @error("year")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('email')}}"  name="business_description" id="business_description" placeholder="Established Year">
                                <label for="business_description"> Business description</label>
                            </div>
                            <div>
                                @error("business_description")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <h5>Contact information</h5>
                        <hr>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('name')}}"  name="person_name" id="name" placeholder="Established Year">
                                <label for="name"> Contact person/name</label>
                            </div>
                            <div>
                                @error("person_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('email')}}"  name="email" id="email" placeholder="Established Year">
                                <label for="email"> Email</label>
                            </div>
                            <div>
                                @error("phone_number")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" value="{{old('phone_number')}}"  name="phone_number" id="phone_number" placeholder="Established Year">
                                <label for="phone_number"> Phone Number</label>
                            </div>
                            <div>
                                @error("phone_number")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('address')}}"  name="address" id="phone_number" placeholder="Established Year">
                                <label for=""> Country</label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('address')}}"  name="address" id="phone_number" placeholder="Established Year">
                                <label for=""> Address</label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                                <label for=""> Postal code</label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
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
                            <div>
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
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="website" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                                <label for=""> Facebook page </label>
                            </div>
                            <div>
                                @error("address")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <h5>Compliance with employment laws</h5>
                       <hr>
                       <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                            <label for=""> Tax identification number/TIN </label>
                        </div>
                        <div>
                            @error("address")
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-floating">
                            <input type="file" class="form-control" value="{{old('address')}}"  name="postal_code" id="phone_number" placeholder="Established Year">
                            <label for=""> Trade license</label>
                        </div>
                        <div>
                            @error("address")
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>
                       

                          <hr>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" name="password" value="{{old('password')}}"  class="form-control" id="subject" placeholder="Subject">
                                <label for="subject"> Password</label>
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


