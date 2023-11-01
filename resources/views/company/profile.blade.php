@extends("company.layouts.app")
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center " >
        <div class="col-md-12 mb-3 bg-white">
            <div class="" >
               
           
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif

               @if (session()->has("success"))
               <div class="alert alert-success " role="alert">
                   {{ session("success") }}
               </div>
           @endif

        
                <form method="POST" action="{{ route('company.updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 my-3">
                       <h5>Company information </h5>
                       <hr>
                        <div class="col-md-6">
                          
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{$profile->company_name}}"  name="company_name" required>
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

   
                        <div class="d-flex col-md-6 justify-around">
                
                            <div class="form-floating ">
                                <input type="file" class="form-control" accept=".jpg,.jpeg,.png"  value=""  name="company_logo" >
                                <label for=""> Company Logo</label>
                            </div>
                            @if(auth()->user()->company->logo)
                <div class="">
                <img src="{{asset('storage/'.auth()->user()->company->logo)}}" alt="Profile" class=" " style="width: 70px; height: 60px;">
                </div>
            @endif

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
                                <textarea class="form-control" name="description" required style="min-height: 150px">{{$profile->description}}</textarea>
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
                                <input type="text" required class="form-control" value="{{$profile->fullname}}"  name="founder_name" >
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
                                <input type="email" class="form-control" value="{{$profile->company_user->email}}"  name="email" required>
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
                                <input type="number" class="form-control" required value="{{$profile->phone_number}}"  name="phone_number" >
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
                                <input type="text" class="form-control" required value="{{$profile->city}}"  name="address" >
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
                                <input type="url" class="form-control" value="{{$profile->linkdelin}}"  name="linkdelin" >
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
                                <input type="url" class="form-control" value="{{$profile->telegram}}"  name="telegram" >
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
                                <input type="url" class="form-control" value="{{$profile->facebook}}"  name="facebook">
                                <label for=""> Facebook page </label>
                            </div>
                            <div>
                                @error("facebook")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                     
                    </div>
                    <div class="col-4">
                            <button class="btn btn-primary w-100 mb-2 py-3" type="submit">Update</button>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
