@extends("admin.layouts.app")
@section("content")

       
    <div class="container-fluid py-3 bg-white rounded">
        <div class="container-fluid">
            <div class="row g-5 align-items-center">
                
                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s">
                <div class="p-0 m-0 my-2">
                <a href="" class="btn btn-primary">Back</a>
                </div>
                    <ul class="list-group">
                    <li class="list-group-item disabled">
                            <h5 class="mb-0 d-flex">Account Status :
                                  @if($startup->startup_user->status == -1)
                                     <p class="text-danger"> Not Approved</p>
                                  @elseif($startup->startup_user->status == 1)
                                  <p class="text-success">  Approved</p>
                                  
                                  @elseif($startup->startup_user->status == 0)
                                  <p class="text-danger">  Restricted</p>

                                  @endif
                            </h5>
                        </li>
                        <li class="list-group-item disabled">
                            <h5 class="mb-0">StartUp Name: {{$startup->business_name}}</h5>
                        </li>
                        <li class="list-group-item disabled">
                            <h5 class="mb-0">Founder: {{$startup->founder_name}}</h5>
                        </li>
                        <li class="list-group-item disabled">
                            <h5 class="mb-0">Email: {{$startup->email}}</h5>
                        </li>
                        <li class="list-group-item d-flex">
                           
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Description:</h6>
                            {{$startup->description}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Phone Number:</h6>
                            {{$startup->phone_number}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Address:</h6>
                            {{$startup->address}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">LinkedIn:</h6>
                            {{$startup->linkedin}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Facebook:</h6>
                            {{$startup->facebook}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Telegram:</h6>
                            {{$startup->telegram}}
                        </li>
                       
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
