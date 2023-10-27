@extends("jobseeker.layouts.app")
@section("content")

<div class="row">
    
              <div class="col-md-10 grid-margin stretch-card">
                <div class="card">

                <ul class="nav nav-pills  p-4" id="pills-tab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link {{request()->is('my-profile/basic-profile') ? 'active' : null }}"  href="{{url('my-profile/basic-profile')}}" >Basic Profile</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link {{request()->is('my-profile/education') ? 'active' : null }}"  href="{{url('my-profile/education')}} ">Education</a>
  </li>
  <li class="nav-item" role="presentation">
  <a class="nav-link {{request()->is('my-profile/experience') ? 'active' : null }}"  href="{{url('my-profile/experience')}} ">Experience</a>
  </li>
</ul>
@if(session()->has("success"))
                    <div class="alert alert-success" role="alert">
                           {{session("success")}}
                    </div>
                    @endif

<!-- basic profile -->
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show {{request()->is('my-profile/basic-profile') ? 'active' : null }}" id="{{url('my-profile/basic-profile')}}" role="tabpanel" aria-labelledby="pills-home-tab">
  <div class="card-body m-0 py-0">
                    <h4 class="card-title">Basic Profile</h4>
                   
                    
                    <form method="POST" action="{{ route('editprofile') }}" enctype="multipart/form-data">
                    @csrf
                      <div class="row g-2">
                      <div class="col-md-6">
                        <label for="exampleInputUsername1">Firstname</label>
                        <input type="text" class="form-control" value="{{$profile->firstname}}"  name="firstname" placeholder="firstname" />
                        @error("firstname")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>
                             
            
                      <div class="col-md-6">
                        <label for="exampleInputEmail1">Lastname</label>
                        <input type="text" class="form-control" name="lastname" value="{{$profile->lastname}}" placeholder="lastname" />
                        @error("lastname")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      </div>
                           
                      <div class="form-group">
                        <label for="exampleInputPassword1">Phone Number</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$profile->phone_number}}"  placeholder="phone number" />
                      </div>
                      @error("phone_number")
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                          <div class="form-group">
                        <label for="exampleInputPassword1">Profile Picture</label>
                        <input type="file" class="form-control" name="profile_image" accept=".png, .jpg, .jpeg" value="{{$profile->profile_image}}"  placeholder="phone number" />
                      </div>
                      @error("profile_image")
                            <span class="text-danger">{{$message}}</span>
                          @enderror

                          <div class="form-group">
                        @if ($profile->profile_image)
                        <div class="rounded-circle" style="width: 100px; height: 100px; overflow: hidden;">
                             <img src="{{ asset('storage/' . $profile->profile_image) }}" alt="Profile Picture" width="100">
                          </div>
                          @else
                          <p>no profile picture</p>
                         @endif    
                         <input type="hidden" name="old_picture" value="{{$profile->profile_image}}">
                         <div class="form-group">
                        <label for="exampleInputPassword1">Resume</label>
                        <input type="file" class="form-control" name="resume" accept=".pdf" value="{{$profile->resume}}"  placeholder="phone number" />
                      </div>
                      @error("resume")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                          @if ($profile->resume)
                        <div class="form-group">
                             <a class="" target="_blank" href="{{ asset('storage/' . $profile->resume) }}" alt="rsume" >Download Cv</a>
                          </div>
                          @else
                          <p>no resume</p>
                         @endif 
                         
                        <input type="hidden" name="old_resume" value="{{$profile->resume}}">
                  
                      <div class="form-group">
                        <label for="exampleTextarea1">Textarea</label>
                        <textarea
                          class="form-control"
                          name="about_me"
                          rows="4"
                        >{{$profile->about_me}}</textarea>
                      </div>
                      @error("about_me")
                                  <span class="text-danger">{{$message}}</span>
                      @enderror
                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Skill</label>
                        <input type="text" class="form-control" name="skills" value="{{$profile->skills}}"  placeholder="skills" />
                      </div>
                      <button type="submit" class="btn btn-primary me-2"> Update </button>
                    </form>
                  </div>
                </div>
  </div>





  <div class="tab-pane fade show {{request()->is('my-profile/education') ? 'active' : null }}" id="{{url('my-profile/education')}}" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="card-body  m-0 py-0">
   
    <form action="{{route('jobseeker.education')}}" method="POST">
        @csrf
                <div class="row g-3">
                      <div class="col-md-6">
                        <label for="exampleInputUsername1">Degree Title</label>
                        <input type="text" class="form-control" required  name="degree" placeholder="Bsc ..." />
                        @error("degree")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="exampleInputUsername1">Field Of Study</label>
                        <input type="text" class="form-control" required   name="department" placeholder="Compuster science,IT" />
                        @error("department")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="exampleInputUsername1">University</label>
                        <input type="text" class="form-control"    name="university" placeholder="Addis Abeba, AASTU" />
                        @error("university")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>
                             
            
                      <div class="col-md-6">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control" required name="start_date" value="" />
                        @error("start_date")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="exampleInputEmail1">End Date /if you are under study leave empty</label>
                        <input type="date" class="form-control"  name="end_date" />
                        @error("end_date")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      
                      
                      </div>
                      <button type="submit" class="btn btn-primary m-2"> Submit </button>
                      </div>
             
                    
    </form>
    <hr>
    <div class="table-responsive p-3">
                      <table class="table">
                       
                         @if($education->count() > 0)
                         <thead>
                          <tr>
                            <th>No</th>
                            <th>Degree</th>
                            
                            <th>Field Of Study</th>
                            <th>description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            
                           
                            <th>Action</th>
                          </tr>
                        </thead>
                        @php
                                  $i=0;
                             @endphp
                             @foreach($education as $edu)
                            
                             <tbody>
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$edu->degree}}</td>
                           
                             <td>{{$edu->field_of_study}}</td>
                             <td>{{$edu->description}}</td>
                            <td>{{$edu->start_date}}</td>
                            <td>{{$edu->end_date}}</td>
                            <td>

                            <form action="{{route('delete.education')}}" method="post">
                               @csrf
                               <input type="hidden" name="id" value="{{$edu->id}}">
                               <button class="btn btn-danger"><span class="mdi mdi-trash-can menu-icon fs-5"></span></button>
                              
                            </form>
                            <td>   
                          </tr>
                        </tbody>

                             @endforeach

                         @endif
                      </table>
                    </div>
    </div>


    <!-- vvv -->

    <div class="tab-pane fade show {{request()->is('my-profile/experience') ? 'active' : null }}" id="{{url('my-profile/experience')}}" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="card-body  m-0 py-0">
   
    <form action="{{route('jobseeker.experience')}}" method="POST">
        @csrf
                <div class="row g-3">
                      <div class="col-md-6">
                        <label for="exampleInputUsername1">Job Possition</label>
                        <input type="text" class="form-control" required  name="job_position" placeholder="Fullstack developer,Graphics Designer" />
                        @error("job_position")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>

                      <div class="col-md-6">
                        <label for="exampleInputUsername1">Company Name</label>
                        <input type="text" class="form-control" required   name="company_name" placeholder="Enter the Name of company" />
                        @error("company_name")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                      </div>

                    
                             
            
                      <div class="col-md-6">
                        <label for="exampleInputEmail1">Start Date</label>
                        <input type="date" class="form-control" required name="start_date" value="" />
                        @error("start_date")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <div class="col-md-6">
                        <label for="exampleInputEmail1">End Date</label>
                        <input type="date" class="form-control"  name="end_date" />
                        @error("end_date")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleTextarea1">Job Desciption</label>
                        <textarea
                          class="form-control"
                          name="description"
                          rows="4"
                          required
                        ></textarea>
                      </div>
                      @error("description")
                                  <span class="text-danger">{{$message}}</span>
                       @enderror
                      
                      
                      </div>
                      <button type="submit" class="btn btn-primary m-2"> Submit </button>
                      </div>
             
                    
    </form>
    <hr>
   
   <div class="table-responsive  p-3" >
                      <table class="table">
                       
                         @if($experience->count() > 0)
                         <thead>
                          <tr>
                            <th>No</th>
                            <th>Job Position</th>
                            <th>Company Name</th>
                            <th>Desciprion</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        @php
                                  $i=0;
                             @endphp
                             @foreach($experience as $exp)
                            
                             <tbody>
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$exp->job_position}}</td>
                          
                             <td>{{$exp->company_name}}</td>
                            <td >{{$exp->description}}</td>
                            <td >{{$exp->start_date}}</td>
                            <td>{{$exp->end_date}}</td>
                            <td>

                            <form action="{{route('delete.experience')}}" method="post">
                               @csrf
                               <input type="hidden" name="id" value="{{$exp->id}}">
                               <button class="btn btn-danger"><span class="mdi mdi-trash-can menu-icon fs-5"></span></button>
                              
                            </form>
                            <td>   
                          </tr>
                        </tbody>

                             @endforeach

                         @endif
                      </table>
                    </div>
    </div>
  </div>
                </div>
 
        
              </div>
            
@endsection
