@extends('layouts.app')
@section('content')
        
        <!-- Search Start -->
        <div class="container-fluid bg-secondary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <div class="row g-2">
                    <div class="col-md-10">
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
                            <div class="col-md-4">
                                <select class="form-select border-0">
                                    <option selected>Location</option>
                                    <option value="1">Location 1</option>
                                    <option value="2">Location 2</option>
                                    <option value="3">Location 3</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-dark border-0 w-100">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search End -->

         <!-- About Start -->
         <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                  
                    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                        <h1>About Us</h1>
                        
                        <h1 class="mb-4">We Help To Get The Best Remote Job And Find A Talented Employee</h1>
                        <p class="mb-4">Join our Vibrant community of exceptional remote job professional and visionary remote job owners.Together 
                            , we will shater obstacles and pave the way for your awe-inspiring future.Embrace the extraordinary, and let us make a road obstacle settled for you

                        </p>

                        <p class="mb-4">
                            Wether your are a job owner or job seeker , Ethio Remote jobs is here to help you achieve your goals.
                        </p>
                       
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
                                    <a class="btn btn-secondary" href="{{route('jobdetail',$job->slug)}}">View Detail</a>
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


        <div class="container-fluid py-5">
            <div class="container">
                <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Frequently Asked Questios</h1>
                <div class="accordion bg-none " id="accordionExample">
                    <div class="accordion-item bg-none">
                      <h2 class="accordion-header bg-white"  id="headingOne">
                        <button class="accordion-button me text-secondary bg-white "  type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse bg-white collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                        </div>
                      </div>
                    </div>

                    <div class="accordion-item bg-none">
                        <h2 class="accordion-header bg-white"  id="headingOne">
                          <button class="accordion-button me text-secondary bg-white "  type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                          </button>
                        </h2>
                        <div id="collapsetwo" class="accordion-collapse bg-white collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                        </div>
                      </div>


                      <div class="accordion-item bg-none">
                        <h2 class="accordion-header bg-white"  id="headingOne">
                          <button class="accordion-button me text-secondary bg-white "  type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapseOne">
                            Accordion Item #1
                          </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse bg-white collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                          <div class="accordion-body">
                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="w-100 d-flex justify-content-center my-3">
                    <a href="" class="btn btn-secondary">Browse More FAQ</a>
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