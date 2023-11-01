@extends("company.layouts.app")
@section("content")
<div class="modal fade" id="applicationModal" tabindex="-1" role="dialog" aria-labelledby="applicationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="applicationModalLabel">Application Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="applicationDescription"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="row bg-white p-4">
    <h4 class="card-title">
        <a href="{{route('company.postjob')}}" class="btn btn-primary">Back</a>
    </h4>
    <hr>
    @if(session()->has("success"))
    <div class="alert alert-success ">
        {{session("success")}}
    </div>
    @endif
    <div class="table-responsive">
        <table id="application" class="table table-striped table-bordered" style="width:100%">
       
        <thead class="p-5">
    <tr>
        <th>No</th>
        <th>Job Title</th>
        <th>Appliciant Name</th>
        <th>Email</th>
        <th>Application Letter</th>
        <th>Action</th>
  
    </tr>
</thead>
            <tbody>
              @if($applications->count() > 0)
                @php
                       $s=0;
                @endphp
              @foreach($applications as $application)
                <tr>
                   <td>{{++$s}}</td>
                   <td>{{$application->job->job_title}}</td>
                   <td>{{$application->app_freelancer->firstname . " " .$application->app_freelancer->lastname }}</td>
                  <td>+251-{{$application->app_freelancer->phone_number}}</td>
                  <td> 
    <button class="btn btn-info viewCoverLetter">View Application Letter</button>
 
</td>
                  <td><a href="{{route('profile',['id'=>$application->app_freelancer->id,'firstname'=>$application->app_freelancer->firstname])}}"  target="_blank" class="btn btn-primary">View profile</a></td>
                </tr>
               
      


                @endforeach
                @endif
             
            </tbody>
           
        </table>
    </div>
</div>

@endsection


@section('script')
 
@endsection



