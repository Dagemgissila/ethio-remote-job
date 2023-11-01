@extends("admin.layouts.app")
@section("content")
<div class="modal" id="deleteModel" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Job</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-capitalize">If you delete this job, you will lose all application for this job. Are you sure you want to delete this job?</p>
        <form action="{{route('companyDeleteJob')}}" method="POST">
            @csrf
            
          <input type="hidden" id="job_id" name="job_id">
          <button type="submmit" class="btn btn-danger">Delete</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="row bg-white p-4">
  
    <hr>
    @if(session()->has("success"))
    <div class="alert alert-success ">
        {{session("success")}}
    </div>
    @endif
    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
       
            <thead class="p-5">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Reported By</th>
                    <th>Case</th>
                    <th>No user Report JOb</th>
                   
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @if($reports->count() > 0)
                    @foreach($reports as $report)
                           <tr>
                              <td>1</td>
                              <td>{{$report->job->job_title}}</td>
                              <td>{{$report->user_report->freelancer->firstname . " " .$report->user_report->freelancer->firstname }}</td>
                              <td>{{$report->description}}</td>
                              <td>{{$report->count()}}</td>

                              <td>
                              <a class="btn btn-info" target="_blank" href="{{ route('jobdetail', ['slug' => $report->job->slug, 'id' => $report->job->id]) }}">View Detail</a>
                              </td>
                           </tr>
                    @endforeach
              @endif
            </tbody>
           
        </table>
    </div>
</div>

@endsection


@section('script')
  <script>
  $(document).ready(function(){
  $('.deleteJob').click(function (e){
    e.preventDefault();
    var job_id = $(this).val();
    $('#job_id').val(job_id)
    $('#deleteModel').modal('show');
  });
});

  </script>
 
@endsection
