@extends('layouts.app')
@section('content')
<div class="container-fluid py-5 bg-dark page-header mb-5">
            <div class="container my-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Search Freelancer</h1>
                <nav aria-label="breadcrumb">
                <div class="row g-2">
                    <div class="col-md-6 mx-auto">
                        <div class="row g-2">
                            <div class="col-md-4">
                                <input type="text" class="form-control border-0" placeholder="Keyword" />
                            </div>
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Category</option>
                                    <option value="1">Category 1</option>
                                    <option value="2">Category 2</option>
                                    <option value="3">Category 3</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                        </div>
                    </div>
                   
                </div>
                   
                </nav>
            </div>
        </div>
        
        <div class="d-flex p-2 align-items-center justify-content-center">
            <h3 class="text-secondary">Freelancers</h3>
        </div>

        @if($freelancers->count() > 0)
                  @foreach($freelancers as $freelancer)
                  <div class="card p-4">     
    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="freelancer shadow p-4 ">
                 <div class="d-flex align-items-center gap-3 mb-2">
                 <img src="https://images.unsplash.com/photo-1579353977828-2a4eab540b9a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8c2FtcGxlfGVufDB8fDB8fHww&w=1000&q=80" alt="Profile Image" style="border-radius: 50%; width: 50px; height: 50px;">
                <h6>{{$freelancer->firstname. " ". $freelancer->lastname}}</h6>

                 </div>
                 <hr>
                         <?php
                            $skills = explode(",", $freelancer->skills);
                            $skills = array_map('trim', $skills);
                        ?>
                       
                            @foreach($skills as $skill)
                           
                            <a href="" class="btn btn btn-outline-secondary extra-small-button mt-1">{{$skill}}</a>
                            @endforeach
                     
              
                <p class="mt-2">{{$freelancer->about_me}}</p>
            </div>
        </div>
    </div>
</div>

                  @endforeach
        @endif





@endsection