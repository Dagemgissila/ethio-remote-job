@extends("startup.layouts.app")
@section("content")
<div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                        <a  href="{{route('startup.postjob')}}"  class="btn btn-primary">Post Job</a>
                    </h4>
                   
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
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Software Developer</td>
                            <td>1000</td>
                             <td>0 May 2017</td>
                            <td>20 May 2017</td>
                            <td>
                                <button class="btn btn-success">Active</button>
                            </td>
                            <td>
                             <button class="btn btn-primary">View</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
@endsection
