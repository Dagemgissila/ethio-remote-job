@extends("jobseeker.layouts.app")
@section("content")

<div class="card">
    
    <div class="card-body table-responsive">
    @if(session()->has("success"))
      <div class="alert alert-success p-2">
            {{session("success")}}
        </div>
      @endif
    <table class="table table-responsive">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Job Title</th>
      <th scope="col">Company Name</th>
      <th scope="col">Job Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  @if($application->count() > 0)

  @php
     $i=0;
  @endphp
      @foreach($application as $jobapp)
      <tbody>
    <tr>
      <th scope="row">{{++$i}}</th>
      <td>{{$jobapp->job->job_title}}</td>

      <!-- posted comapny -->
       @if($jobapp->job->UserJob->company)
      <td>{{$jobapp->job->UserJob->company->company_name}}</td>
      @elseif($jobapp->job->UserJob->startup)
      <td>{{$jobapp->job->UserJob->company->business_name}}</td>
      @endif

      <!-- job status -->
      <td>
                                  @if($jobapp->job->status == 1)
                                     <span class="font-weight-bold text-primary">Pending</span>
                                  @elseif($jobapp->job-> status == -1)
                                  <span class="font-weight-bold text-danger">Restricted By Admin</span>
                                  @elseif($jobapp->job->status == 0)
                                  <span class="font-weight-bold text-warning">Closed</span>
                                  @elseif($jobapp->job->status == 2)
                                  <span class="font-weight-bold text-danger">Deadline is Passed</span>
                                  @endif

         </td>
      <td>
                <div class="d-flex gap-2">
                <form action="{{route('delete.application',['jobid'=>$jobapp->job_id,'app_id'=>$jobapp->freelancer_id])}}" method="post">
                               @csrf
                               <input type="hidden" name="id" value="">
                               <button class="btn btn-danger"><span class="mdi mdi-trash-can menu-icon fs-5"></span></button>
                              
                     </form>
                     <a class="btn btn-primary" target="_blank" href="{{ route('jobdetail', ['slug' => $jobapp->job->slug, 'id' => $jobapp->job->id]) }}"><span class="mdi mdi-eye menu-icon fs-5"></span></a>

                    
                </div>
      </td>
    </tr>
 
  </tbody>
      @endforeach
  @endif
</table>
    </div>
</div>

@endsection