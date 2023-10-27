@extends('layouts.app')

@section("content")
<div class="container-fluid p-4 d-flex flex-column justify-content-center" style="background-color: rgb(250, 249, 249)">
    <h1 class="text-center my-4">Register Us</h1>
    <div class="row d-flex justify-content-center align-items-center w-100 mx-auto gap-3 company-option">
        <div class="col-lg-2 text-center bg-secondary ">
            <a href="{{route('register.jobseeker')}}" class="text-dark p-2">
                <span><i class="fas fa-user fa-2x my-3"></i></span>
            <p>Job Seeker</p>
            </a>
        </div>
        <div class="col-lg-2 text-center bg-secondary ">
            <a href="{{route('register.startup')}}" class="text-dark p-2">
                <span><i class="fas fa-rocket fa-2x my-3"></i></span>
            <p>Start Up</p>
            </a>
        </div>
        <div class="col-lg-2 text-center bg-secondary">
            <a href="{{route('register.licenced')}}" class="text-dark p-2">
                <span><i class="fas fa-building fa-2x my-3"></i></span>
            <p>Licensed Company</p>
            </a>
        </div>

    </div>
</div>

@endsection


