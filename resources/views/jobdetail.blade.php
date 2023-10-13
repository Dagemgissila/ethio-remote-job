@extends("layouts.app")
@section("content")

   <!-- Header End -->
   <div class="container-fluid py-5 bg-dark page-header mb-5">
            <div class="container my-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
                <nav aria-label="breadcrumb">
                   
                </nav>
            </div>
        </div>
        <!-- Header End -->
  <!-- Job Detail Start -->
  <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            @auth
                        @if($job->UserJob)
                              @if($job->UserJob->company)

                              <img class="flex-shrink-0 img-fluid border rounded" src="{{ asset('storage/' . $job->UserJob->company->logo) }}" alt="" style="width: 80px; height: 80px;">


                              @elseif($job->UserJob->startup)


                              @else

                
                              @endif

                            @endif
                            @endauth
       
                            <div class="text-start ps-4">
                                <h3 class="mb-1">{{$job->job_title}}</h3>
                               
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>{{$job->description}}</p>
                            <h4 class="mb-3">Responsibility</h4>
                            <p>{{$job->requirement}}</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul>
                          
                        </div>
        
                          @if((auth()->user()->id) !== ($job->user_id))

                          <div class="">
                            <h4 class="mb-4">Apply For The Job</h4>
                            <form>
                                <div class="row g-3">
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="text" class="form-control" placeholder="Portfolio Website">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <input type="file" class="form-control bg-white">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="5" placeholder="Coverletter"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Apply Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                          @endif
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-secondary text-white rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-white me-2"></i>Published On: {{$job->created_at}}</p>
                            <p><i class="fa fa-angle-right text-white me-2"></i>Salary: {{$job->salary}}</p>
                            
                            <p class="m-0"><i class="fa fa-angle-right text-white me-2"></i>Date Line: {{$job->deadline}}</p>
                        </div>
                        <div class="bg-secondary text-white rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">
                         
                            @if($job->UserJob)
                              @if($job->UserJob->company)

                              {{$job->UserJob->company->description}}

                              @elseif($job->UserJob->startup)
                              {{$job->UserJob->startup->description}}

                              @else

                            

                              @endif

                            @endif


                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->

@endsection