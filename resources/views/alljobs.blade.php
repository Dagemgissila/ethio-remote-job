@extends('layouts.app')
@section('content')
    <!-- Header End -->
    <div class="container-fluid py-5 bg-dark page-header ">
            <div class="container my-3 pt-5 pb-2">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                   
                </nav>
            </div>
        </div>
        <!-- Header End -->
        <div class="container-fluid bg-secondary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
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
            </div>
        </div>
        <!-- Search End -->
    
        <!-- Jobs Start -->
        <div class="container my-1 mb-4">
            <div class="row gap-4">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
                <div class="col-lg-8 col-md-12 d-flex flex-column gap-3">
               
                  
                         @if($jobs->count() > 0)
                             @foreach($jobs as $job)
                             <div class="job-item p-4 mb-1 wow fadeIn"  data-wow-delay="0.3s" >
                        <div class="row g-4 p-0 p-sm-3">
                            <div class="col-sm-12 col-md-8 d-flex align-items-center ">
                               
                                <div class="text-start ">
                                    <h5 class="mb-3">Title : {{$job->job_title}}</h5>
                                   
                                    @if($job->UserJob)
                            @if($job->UserJob->company)
                                <h6>Company: {{$job->UserJob->company->company_name}}</h6>
                            @elseif($job->UserJob->startup)
                                <h6>Company: {{$job->UserJob->startup->business_name}}</h6>
                            @else
                                <h6>Company/Startup not found</h6>
                            @endif
                        @else
                            <h6>User not found</h6>
                        @endif
                        <p>{{ $job->getShortDescription() }}.</p>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                <div class="d-flex mb-3">
                                    <a class="btn btn-secondary" href="">View Detail</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-secondary me-2"></i>Deadline: {{$job->deadline}}</small>
                            </div>
                        </div>
                    </div>

                             @endforeach

                         @endif
                    <div class="w-100 d-flex justify-content-center">
                         <a href="" class="btn btn-secondary">Browse More job</a>
                    </div>
                

                 
                </div>

                
                

                <div class="col-lg-3 col-md-12">
                    <div class="">
                        <h2 class="mb-3">Find By Category</h2>
                        <div class="d-flex flex-column category">
                           <a href="index.html" class="d-flex justify-content-between px-2 ">Sales and Marketing  <span>23</span></a>
                           <hr> 
                           <a href="index.html" class="d-flex justify-content-between px-2 ">Information Technology  <span>43</span></a> 
                           <hr>
                           <a href="index.html" class="d-flex justify-content-between px-2 ">Content Creater  <span>13</span></a> 
                           
                        </div>
                 
                    </div>
                </div>
            </div>
            
        </div>

@endsection