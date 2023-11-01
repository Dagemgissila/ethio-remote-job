@extends("startup.layouts.app")
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
        <form action="{{route('startup.delete')}}" method="POST">
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
    <h4 class="card-title">
        <a href="{{route('startup.postjob')}}" class="btn btn-primary">Post New Job</a>
    </h4>
    <hr>
    @if(session()->has("success"))
    <div class="alert alert-success ">
        {{session("success")}}
    </div>
    @endif
    <div class="table-responsive">
        <table id="jobs" class="table table-striped table-bordered" style="width:100%">
       
            <thead class="p-5">
                <tr>
                    <th>No</th>
                    <th>Job Title</th>
                    <th>Salary In ETB</th>
                    <th>Created at</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if($jobs->count() > 0)
                  @php
                          $i=0;
                  @endphp
                @foreach($jobs as $job)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$job->job_title}}</td>
                    <td>{{$job->salary}}</td>
                    <td>{{$job->created_at}}</td>
                    <td>{{$job->deadline}}</td>
                    <td>
                        @if($job->status == 1)
                        <span class="font-weight-bold text-success">Active</span>
                        @elseif($job-> status == -1)
                        <span class="font-weight-bold text-danger">Restricted</span>
                        @elseif($job->status == 0)
                        <span class="font-weight-bold text-warning">Closed</span>
                        @elseif($job->status == 2)
                        <span class="font-weight-bold text-danger">Deadline is Passed</span>
                        @endif
                    </td>
                    <td>
    <a href="{{route('jobdetail',['slug'=>$job->slug,'id'=>$job->id])}}" target="_blank" class="btn btn-info">
        <i class="fa fa-eye"></i> Detail
    </a>
    <a class="btn btn-primary" href="{{ route('startup.editjob', ['id' => $job->id,'title'=>$job->slug]) }}">
        <i class="fa fa-edit"></i> Edit
</a>
<a class="btn btn-warning" href="{{ route('startup.viewApplication', ['id' => $job->id,'slug'=>$job->slug]) }}">
    <i class="fa fa-file"></i> View Application
</a>

    <button type="button" class="btn btn-danger deleteJob" value="{{$job->id}}">
        <i class="fa fa-trash"></i> Delete
    </button>
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
