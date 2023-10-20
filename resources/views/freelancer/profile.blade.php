@extends('layouts.app')
@section('content')

<div class="container-fluid py-5 bg-dark page-header mb-5">
            <div class="container my-3">
                
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


<div class="container ">
<div class="card">     
    <div class="row ">

        <div class="col-lg-4 col-md-4 col-sm-12">
             
              <div class=" shadow p-4 ">
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
                           
                            <a href="" class="btn btn btn-outline-secondary  m-1">{{$skill}}</a>
                            @endforeach
                     
              
                <div class="mt-3 d-flex flex-column gap-2">
                    <button class="btn btn-secondary">Message Me</button>
                    <button class="btn btn-secondary">Call Me</button>

                </div>
            </div>
           
        </div>


        <div class="col-lg-8 col-md-4 col-sm-12">
             
             <div class=" shadow p-4 ">
                
             <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">About Me</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Experience</button>
    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-portfolio" type="button" role="tab" aria-controls="nav-portfolio" aria-selected="false">Portfolio</button>
    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Education</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active p-2" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    {{$freelancer->about_me}}
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

      <div class="row w-100">
                </div>
                <div class="row">
                    <div class="col-lg-12 m-15px-tb">
                        <div class="resume-box">
                            <ul>
                                @if($freelancer->experience-> count())
                                  @foreach($freelancer->experience as $exp)
                                <li>
                                    <div class="icon">
                                    <i class="fas fa-briefcase"></i>
                                    </div>
                                    <span class="time">{{$exp->start_date}} - {{$exp->end_date}}</span>
                                    <h5>{{$exp->company_name}}c</h5>
                                    <h5>{{$exp->job_position}}</h5>
                                    <p>{{$exp->description}}</p>
                                </li>
                                @endforeach
                                @endif
    
                            </ul>
                        </div>
                    </div>
                </div>


  </div>



  <div class="tab-pane fade" id="nav-portfolio" role="tabpanel" aria-labelledby="nav-portfolio-tab">
  @if($freelancer->portfolio->count())
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        @foreach($freelancer->portfolio as $index => $port)
          <?php $images = explode('|', $port->images); ?>
          @foreach($images as $imgIndex => $image)
          <div class="carousel-item {{ $index == 0 && $imgIndex == 0 ? 'active' : '' }}" style="height: 400px; position: relative;">
  <img src="{{ asset($image) }}" class="d-block w-100" alt="..." style="">
  <div class="carousel-caption text-white p-2" style="position: absolute; bottom: 0; left: 0; width: 100%; height: 30%; background-color: rgba(0, 0, 0, 0.4); display: flex; flex-direction: column; justify-content: center; align-items: center;">
  <p style="text-align: center;">{{ $port->title }}</p>
 
  <a href="{{ $port->link }}" style="text-align: center;">link</a>
</div>

</div>

          @endforeach
        @endforeach
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-secondary" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-secondary" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  @endif
</div>




  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="row w-100">
                </div>
                <div class="row">
                    <div class="col-lg-12 m-15px-tb">
                        <div class="resume-box">
                            <ul>
                                @if($freelancer->education-> count())
                                  @foreach($freelancer->education as $edu)
                                <li>
                                    <div class="icon">
                                    <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <span class="time">{{$edu->start_date}} - {{$edu->end_date}}</span>
                                    <h5>{{$edu->degree}}c</h5>
                                    <h5>{{$edu->field_of_study}}</h5>
                                    <p>{{$edu->description}}</p>
                                </li>
                                @endforeach
                                @endif
    
                            </ul>
                        </div>
                    </div>
                </div>


  </div>
  </div>
</div>
           </div>
          
       </div>
    
    </div>
</div>
</div>

@endsection