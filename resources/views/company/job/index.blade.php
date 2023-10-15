@extends("company.layouts.app")
@section("content")
<div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                 
                  <div class="card-body">
                    <h4 class="card-title">
                        <a  href="{{route('company.postjob')}}"  class="btn btn-primary">Post Job</a>
                    </h4>
                    @if(session()->has("success"))
                      <div class="alert alert-success ">
                             {{session("success")}}
                      </div> 
                  @endif
                   
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
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
                         @if($jobs->count() > 0)
                             @foreach($jobs as $job)
                             <tbody>
                          <tr>
                            <td>1</td>
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
                              <a href="{{route('jobdetail',$job->slug)}}"  target="_blank" class="btn btn-info">Detail</a>
                             <button class="btn btn-primary">Edit</button>
                             <button class="btn btn-danger">Delete</button>
                             <button class="btn btn-warning">View Application</button>
                            </td>
                          </tr>
                        </tbody>

                             @endforeach

                         @endif
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection
