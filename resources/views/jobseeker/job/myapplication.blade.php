@extends("jobseeker.layouts.app")
@section("content")
<div class="modal" id="deleteApp" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Application</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this job application</p>
       
        <form action="{{route('delete.application')}}" method="POST">
            @csrf
            
             <input type="hidden" name="app_id"   id="app_id">
          <button type="submmit" class="btn btn-danger m-2">Delete</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
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
      <td>{{$jobapp->job->UserJob->startup->business_name}}</td>
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
                <button class="btn btn-danger deleteApp" value="{{$jobapp->job_id}}"><span class="mdi mdi-trash-can menu-icon fs-5"></span>Delete </button>
               
                     <a class="btn btn-primary" target="_blank" href="{{ route('jobdetail', ['slug' => $jobapp->job->slug, 'id' => $jobapp->job->id]) }}"><span class="mdi mdi-eye menu-icon fs-5"></span>View Job</a>

                    
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


@section("script")

<script>
  $(document).ready(function(){
  $('.deleteApp').click(function (e){
    e.preventDefault();
    var app_id = $(this).val();
    $('#app_id').val(app_id)
    $('#deleteApp').modal('show');
  });
});

</script>

@endsection