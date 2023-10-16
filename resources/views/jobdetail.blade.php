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
  <div class="container-xxl py-2 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                @if(session()->has("success"))
                        <div class="alert alert-success p-4">
                                  {{session("success")}}
                        </div>
                @endif
                @if(session()->has("error"))
                        <div class="alert alert-danger p-4">
                                  {{session("error")}}
                        </div>
                @endif
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
                        <div class="social-share-buttons d-flex align-items-center mb-1">
                            <h3 class="">Share To</h3>
{!! $shareButton !!}
    </div>
        
                    
                    </div>
        
                    <div class="col-lg-4">
                        <div class="alert alert-secondary text-dark shadow rounded p-4 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fas fa-calendar-alt text-secondary me-2"></i>Published At: {{$job->created_at}}</p>
<p><i class="fas fa-money-bill-alt text-secondary me-2"></i>Salary: {{$job->salary}}</p>
<p class="m-0"><i class="fas fa-clock text-secondary me-2"></i>Deadline: {{$job->deadline}}</p>

                        </div>
                        <div class="alert alert-secondary shadow text-dark rounded p-4 wow slideInUp" data-wow-delay="0.1s">
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

                      @if($job->UserJob)
                         @if($job->UserJob->company)
                                  @if($job->UserJob->company->linkdelin || $job->UserJob->company->facebook || $job->UserJob->telegtam)
                                  <div class="alert alert-secondary shadow text-dark  rounded p-4 mt-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Follow Us</h4>
                            <div class="d-flex pt-2 gap-3">
                                     @if($job->UserJob->company->linkdelin)
                                     <a class="btn btn-outline-secondary btn-social" target="_blank" href="{{$job->UserJob->company->linkdelin}}"><i class="fab fa-linkedin-in"></i></a>
                                     @endif

                                     @if($job->UserJob->company->facebook)
                                     <a class="btn btn-outline-secondary btn-social" target="_blank" href="{{$job->UserJob->company->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                     @endif

                                     @if($job->UserJob->company->telegram)
                                     <a class="btn btn-outline-secondary btn-social" target="_blank" href="{{$job->UserJob->company->telegram}}"><i class="fab fa-telegram"></i></a>
                                     @endif
                    
                </div>
                        </div>
                                  @endif
                                   
                         @elseif($job->UserJob->startup)

                         @else


                         @endif



                      @endif


                        
                    </div>
                    @if((auth()->user()->id) !== ($job->user_id))

<div class="">
  <h4 class="mb-4">Apply For The Job</h4>
  
      <div class="row g-3">
         
         <form action="{{route('job.JobApplication')}}" method="POST">
          @csrf
          <input type="hidden" name="job_id" value="{{$job->id}}">
         <div class="col-12">
              <textarea class="form-control" name="application"  rows="5" placeholder="Write Application Letter"></textarea>
          </div>
          <div class="p-2">
      @error("application")
        <span class="text-danger p-2">{{$message}}</span>
      @enderror
  </div>
  <div class="col-4 m-2">
  <button class="btn btn-secondary w-100 py-2" type="submit">Apply </button>
</div>
         </form>
      </div>
  
</div>

@endif

                    
                </div>
            </div>
        </div>
        <!-- Job Detail End -->

@endsection