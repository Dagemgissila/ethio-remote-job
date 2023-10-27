@extends('layouts.app')
@section('content')

  <!-- Header End -->
  <div class="container-fluid py-5 bg-dark page-header ">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Only Remote Jobs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-white font-weight-bold">
                        <li class="breadcrumb-item">The platform Which Directly connect Ethiopia Remote Job Owners With Remote Job Profesional for Free</li>
                      
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
                <!-- Search Start -->
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

         


        <!-- About Start -->
        <div class="container-xxl py-3">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="row g-0 about-bg rounded overflow-hidden">
                            <div class="col-6 text-start">
                                <img class="img-fluid w-100" src="{{asset('home/img/aboutimage1.png')}}">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid" src="{{asset('home/img/aboutimage2.png')}}" style="width: 85%; margin-top: 15%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid" src="{{asset('home/img/aboutimage3.jpg')}}" style="width: 85%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid w-100" src="{{asset('home/img/aboutimage4.jpg')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="mb-4">We Help To Get The Best Remote Job And Find A Talented Employee</h1>
                        <p class="mb-4">Join our Vibrant community of exceptional remote job professional and visionary remote job owners.Together 
                            , we will shater obstacles and pave the way for your awe-inspiring future.Embrace the extraordinary, and let us make a road obstacle settled for you</p>
               @guest
                        <a class="btn btn-secondary py-3 px-5 mt-3" href="{{route('register')}}">Register Here</a>
                @endguest
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->







        <div class="container my-1">
            <div class="row gap-4">
                <div class="col-lg-8 col-md-12 d-flex flex-column gap-3">
                    <h2>Recent Jobs</h2>
                  
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
                                <a class="btn btn-secondary" href="{{ route('jobdetail', ['slug' => $job->slug, 'id' => $job->id]) }}">View Detail</a>
                                </div>
                                <small class="text-truncate"><i class="far fa-calendar-alt text-secondary me-2"></i>Deadline: {{$job->deadline}}</small>
                            </div>
                        </div>
                    </div>

                             @endforeach

                         @endif
                    <div class="w-100 d-flex justify-content-center">
                         <a href="{{route('alljobs')}}" class="btn btn-secondary">Browse More job</a>
                    </div>
                

                 
                </div>

                
                

                <div class="col-lg-3 col-md-12">
                    <div class="">
                        <h2 class="mb-3">Find By Category</h2>
                       
                        <div class="d-flex flex-column category">
                        @if($categories->count() > 0)
                               @foreach($categories as $category)
                             
                               <a href="" class="d-flex justify-content-between px-2 ">{{$category->name}}  <span>{{$category->count()}}</span></a> 
                               @endforeach
                        
                        @else
                          <p>no category is found</p>
                        @endif
                        </div>
                       
                 
                    </div>
                </div>
            </div>
            
        </div>


        <div class="container-fluid py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Frequently Asked Questios</h1>
                <div class="accordion bg-none " id="accordionExample">
                   
 <!-- FAQ 1 -->
 <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingOne">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. What is Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse bg-white collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Ethio Remote Jobs is a platform dedicated to connecting Ethiopian professionals with remote job
                        opportunities. We provide a wide range of services to both job seekers and employers in Ethiopia.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingTwo">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        2. What types of jobs are posted on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse bg-white collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        On Ethio Remote Jobs, only remote job vacancies that can be done remotely are posted. This allows
                        job seekers to find opportunities that offer flexibility and the ability to work from anywhere.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingThree">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        3. How can I find remote job opportunities on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse bg-white collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        To find remote job opportunities, simply join our Telegram channel by [insert instructions to join
                        the channel]. We regularly post remote job openings from various industries and sectors. Stay tuned
                        and browse through the job listings in the channel to find suitable positions.
                    </div>
                </div>
            </div>

                  </div>

                  <div class="w-100 d-flex justify-content-center my-3">
                    <a href="/FAQ" class="btn btn-secondary">Browse More FAQ</a>
               </div>

            </div>
        </div>
        


       


      


        <!-- Contact Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span>123 Street, New York, USA</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>info@example.com</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>+012 345 6789</span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
        <!-- Contact End -->
@endsection