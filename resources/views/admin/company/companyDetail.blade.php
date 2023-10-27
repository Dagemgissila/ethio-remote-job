@extends("admin.layouts.app")
@section("content")
    <h3 class="btn btn-primary text-white fs-5 p-2">Licensed Company List</h3>
    <!-- About Start -->
       
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
                                  @if($company->company_user->status == -1)
                                     <p class="text-danger"> Not Approved</p>
                                  @elseif($company->company_user->status == 1)
                                  <p class="text-success">  Approved</p>
                                  
                                  @elseif($company->company_user->status == 0)
                                  <p class="text-danger">  Restricted</p>

                                  @endif
                            </h5>
                        </li>
                        <li class="list-group-item disabled">
                            <h5 class="mb-0">Company Name: {{$company->company_name}}</h5>
                        </li>
                        <li class="list-group-item d-flex">
                            <h6 class="mb-3">Logo:</h6>
                            <a href="{{asset('storage/'.$company->logo)}}" target="_blank">
                                <img src="{{asset('storage/'.$company->logo)}}" class="flex-shrink-0 img-fluid border rounded" style="height:200px;width:250px;" alt="">
                            </a>
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Description:</h6>
                            {{$company->description}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Phone Number:</h6>
                            {{$company->phone_number}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">City:</h6>
                            {{$company->city}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-0">LinkedIn:</h6>
                            {{$company->linkedin}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Facebook:</h6>
                            {{$company->facebook}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">Telegram:</h6>
                            {{$company->telegram}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">TIN Number:</h6>
                            {{$company->tin_number}}
                        </li>
                        <li class="list-group-item">
                            <h6 class="mb-1">License:</h6>
                            <a href="{{asset('storage/'.$company->license)}}" target="_blank">View License <i class="fas fa-external-link-alt"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
