@extends("admin.layouts.app")
@section("content")
<h3 class="btn btn-primary text-white fs-5 p-2">Start Ups </h3>
<div class="modal" id="deletecompany" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <form action="{{route('admin.deleteCompany')}}" method="POST">
            @csrf
            
             <input type="text" name="company_id"  id="startup_id">
          <button type="submmit" class="btn btn-danger m-2">Delete</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal" id="RestrictAccount" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Restrict Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Once You Restrict this account User can not able to login!!</p>
       
        <form action="{{route('admin.RestrictCompany')}}" method="POST">
            @csrf
            
             <input type="hidden" name="company_id"   id="r_id">
          <button type="submmit" class="btn btn-primary m-2">Restrict</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<div class="modal" id="Active" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Activate Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
       <p>Re you Sure you want to Activate this account?</p>
        <form action="{{route('admin.ApproveCompany')}}" method="POST">
            @csrf
            
             <input type="hidden" name="company_id"   id="a_id">
          <button type="submmit" class="btn btn-success m-2">Approve</button>
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
                    <th> Startup Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Registered At</th>
                     <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               @if($startups->count() > 0)
                       @foreach($startups as $startup)
                              <tr> 
                                 <td>1</td>
                                 <td>{{$startup->business_name}}</td>
                                 <td>{{$startup->startup_user->email}}</td>
                                 <td>{{$startup->phone_number}}</td>
                                 <td>{{$startup->startup_user->created_at}}</td>
                                 <td>
                                    @if($startup->startup_user->status == -1)
                                         <p class="text-danger font-serif font-weight-bold">Not Aproved</p>
                                    @elseif($startup->startup_user->status == 1 )
                                    <p class="text-success font-serif font-weight-bold">Active</p>
                                    @elseif($startup->startup_user->status == 0)
                                    <p class="text-danger font-serif font-weight-bold">Restricted</p>
                                    @endif
                                </td>
                              
                                <td class="d-flex gap-2 py-4">
                                <a class="btn btn-primary" href="{{ route('admin.startupDetail', ['id' => $startup->id,'name'=>$startup->business_name]) }}">
                                <i class="fa fa-eye"></i> Detail
                                </a>

                                            @if($startup->startup_user->status== -1)
                                              <form action="{{route('admin.ApproveCompany')}}" method="POST">
                                                @csrf
                                                 <input type="hidden" name="company_id" value="{{$startup->startup_user->id}}">
                                              <button class="btn btn-success" type="submit">
                                                      <i class="fa fa-check"></i> Approve
                                               </button>  
                                              </form>

                                                <button class="btn btn-danger deleteCompany" value="{{$startup->startup_user->id}}">
                                                      <i class="fa fa-trash"></i> Delete
                                                </button>
                                            @elseif($startup->startup_user->status== 1)
                                            <button type="button" class="btn btn-warning Restrict" value="{{$startup->startup_user->id}}">
                                                 <i class="fa fa-ban"></i> Restrict Account
                                            </button>
                                              @elseif($startup->startup_user->status== 0)
                                              <button class="btn btn-success Active" value="{{$startup->startup_user->id}}">
                                                    <i class="fa fa-check"></i> Active Account
                                              </button>
                                            @endif

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
  $('.deleteCompany').click(function (e){
    e.preventDefault();
    var startup_id = $(this).val();
    $('#startup_id').val(startup_id)
    $('#deletecompany').modal('show');
  });
});


$(document).ready(function(){
  $('.Restrict').click(function (e){
    e.preventDefault();
    var r_id = $(this).val();
    $('#r_id').val(r_id)
    $('#RestrictAccount').modal('show');
  });
});

$(document).ready(function(){
  $('.Active').click(function (e){
    e.preventDefault();
    var a_id = $(this).val();
    $('#a_id').val(a_id)
    $('#Active').modal('show');
  });
});



  </script>
 
@endsection
