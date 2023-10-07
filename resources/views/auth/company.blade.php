@extends('layouts.app')
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center " >
        <div class="col-md-6 my-5  p-4 bg-white">
            <div class="" >
                <h2 class="my-4">Register Us Licenced Company</h2>
                <hr>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif

               @if (session()->has("message"))
               <div class="bg-success text-white p-2">
                   {{ session("message") }}
               </div>
           @endif
           
                <form method="POST" action="{{ route('register.licenced') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 my-3">
                       <h5>Company information </h5>
                       <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{old('company_name')}}"  name="company_name" required>
                                <label for=""> Company Name</label>
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
                                <input type="file" class="form-control" required value="{{old('company_logo')}}"  name="company_logo" i >
                                <label for=""> Company Logo</label>
                            </div>
                            <div>
                                @error("company_logo")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="description" required style="min-height: 150px">{{old("description")}}</textarea>
                                <label for="">Business Description</label>
                            </div>

                            <div>
                                @error("description")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <h5>Contact information</h5>
                        <hr>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" required class="form-control" value="{{old('fullname')}}"  name="fullname" >
                                <label for=""> Contact person/fullname</label>
                            </div>
                            <div>
                                @error("fullname")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{old('email')}}"  name="email" required>
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
                                <input type="number" class="form-control" required value="{{old('phone_number')}}"  name="phone_number" >
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
                                <input type="text" class="form-control" required value="{{old('city')}}"  name="city" >
                                <label for="city"> City</label>
                            </div>
                            <div>
                                @error("city")
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
                                <input type="website" class="form-control" value="{{old('linkdelin')}}"  name="linkdelin" >
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
                                <input type="website" class="form-control" value="{{old('telegram')}}"  name="telegram" >
                                <label for=""> Telegram channel/group</label>
                            </div>
                            <div>
                                @error("telegram")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
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

                        <h5>Compliance with employment laws</h5>
                       <hr>
                       <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" value="{{old('tin_number')}}"  name="tin_number">
                            <label for=""> Tax identification number/TIN </label>
                        </div>
                        <div>
                            @error("tin_number")
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>

                       <div class="col-md-6">
                        <div class="form-floating">
                            <input type="file" class="form-control" value="{{old('license')}}"  name="license" >
                            <label for=""> Trade license</label>
                        </div>
                        <div>
                            @error("license")
                              <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       </div>
                       

                          <hr>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" required name="password"  >
                                <label for=""> Password</label>
                            </div>
                            @error("password")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" required name="password_confirmation"  >
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


