@extends("layouts.app")
@section("content")
<div class="container-fluid " style="background-color: rgb(250, 249, 249)">
    <div class="row d-flex justify-content-center align-items-center" >
        <div class="col-md-6 my-5  p-3 bg-white">
            <div class="" >
                <p class="my-4">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one</p>
                <hr>
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
               <form method="POST" action="{{ route('password.email') }}">
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
                           
                        
                        <div class="col-4 my-3">
                        <button class="btn btn-secondary w-100 py-2" type="submit">Email Password Reset Link</button>
                        </div>
                    </div>
                </form>
               
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