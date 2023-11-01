@extends("admin.layouts.app")
@section("content")
<h3 class="btn btn-primary text-white fs-5 p-2">Licensed Company List</h3>
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
            
             <input type="hidden" name="company_id"  id="company_id">
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

<div class="modal" id="Approve" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Approve Company</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to approve</p>
       
        <form action="{{route('admin.ApproveCompany')}}" method="POST">
            @csrf
            
             <input type="hidden" name="company_id"   id="ap_id">
          <button type="submmit" class="btn btn-success m-2">Approve</button>
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
       
       
        <form action="{{route('admin.ApproveCompany')}}" method="POST">
            @csrf
            
             <input type="hidden" name="company_id"   id="a_id">
          <button type="submmit" class="btn btn-success m-2">Active</button>
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
                    <th> Company Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Logo</th>
                    <th>Registered At</th>
                     <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                      @if($companys->count() > 0)
                       @php
                         $s=0;
                       @endphp
                           @foreach($companys as $company)
                              <tr>
                                <td>{{++$s}}</td>
                                <td>{{$company->company_name}}</td>
                                <td>{{$company->company_user->email}}</td>
                                <td>{{$company->city}}</td>
                                <td>  <img src="{{asset('storage/'.$company->logo)}}"  alt="company Logo"  class="flex-shrink-0 img-fluid border rounded" style="height:60px;width:80px;" ></td>
                                <td>{{$company->created_at}}</td>
                                <td>
                                    @if($company->company_user->status == -1)
                                         <p class="text-danger font-serif font-weight-bold">Not Aproved</p>
                                    @elseif($company->company_user->status == 1 )
                                    <p class="text-success font-serif font-weight-bold">Active</p>
                                    @elseif($company->company_user->status == 0)
                                    <p class="text-danger font-serif font-weight-bold">Restricted</p>
                                    @endif
                                </td>
                                <td class="d-flex gap-2 py-4">
                                <a class="btn btn-primary" href="{{ route('admin.companydetail', ['id' => $company->id,'name'=>$company->company_name]) }}">
                                <i class="fa fa-eye"></i> Detail
                                </a>
                              

                                            @if($company->company_user->status== -1)
                                                 <button class="btn btn-success Approve" value="{{$company->company_user->id}}" type="button">
                                                      <i class="fa fa-check"></i> Approve
                                               </button> 

                                                <button class="btn btn-danger deleteCompany" value="{{$company->company_user->id}}">
                                                      <i class="fa fa-trash"></i> Delete
                                                </button>
                                            @elseif($company->company_user->status== 1)
                                            <button type="button" class="btn btn-warning Restrict" value="{{$company->company_user->id}}">
                                                 <i class="fa fa-ban"></i> Restrict Account
                                            </button>
                                              @elseif($company->company_user->status== 0)
                                              <button class="btn btn-success Active" value="{{$company->company_user->id}}">
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
    var company_id = $(this).val();
    $('#company_id').val(company_id)
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

$(document).ready(function(){
  $('.Approve').click(function (e){
    e.preventDefault();
    var ap_id = $(this).val();
    $('#ap_id').val(ap_id)
    $('#Approve').modal('show');
  });
});

  </script>
 
@endsection
