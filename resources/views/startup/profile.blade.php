@extends("startup.layouts.app")
@section("content")
<div class="container-fluid" style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12 mb-3 bg-white">
            <div>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
                @endif

                @if (session()->has("success"))
                <div class="alert alert-success" role="alert">
                    {{ session("success") }}
                </div>
                @endif

                <form method="POST" action="{{ route('startup.updateProfile') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-3 my-3">
                 
                        <hr>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{ $profile->business_name }}" name="business_name" required>
                                <label for="business_name">Business Name</label>
                            </div>
                            <div>
                                @error("business_name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" required class="form-control" value="{{ $profile->founder_name }}" name="founder_name">
                                <label for="founder_name">Founder Name</label>
                            </div>
                            <div>
                                @error("founder_name")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="description" required style="min-height: 150px">{{ $profile->description }}</textarea>
                                <label for="description">Business Description</label>
                            </div>
                            <div>
                                @error("description")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" value="{{ $profile->startup_user->email }}" name="email" required>
                                <label for="email">Email</label>
                            </div>
                            <div>
                                @error("email")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="number" class="form-control" required value="{{ $profile->phone_number }}" name="phone_number">
                                <label for="phone_number">Phone Number</label>
                            </div>
                            <div>
                                @error("phone_number")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" required value="{{ $profile->address }}" name="address">
                                <label for="address">Address</label>
                            </div>
                            <div>
                                @error("address")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" value="{{ $profile->linkdelin }}" name="linkdelin">
                                <label for="linkdelin">LinkedIn Profile</label>
                            </div>
                            <div>
                                @error("linkdelin")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" value="{{ $profile->telegram }}" name="telegram">
                                <label for="telegram">Telegram Channel/Group</label>
                            </div>
                            <div>
                                @error("telegram")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="url" class="form-control" value="{{ $profile->facebook }}" name="facebook">
                                <label for="facebook">Facebook Page</label>
                            </div>
                            <div>
                                @error("facebook")
                                <span class="text-danger">{{ $message }}</span>
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
