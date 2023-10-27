@extends("admin.layouts.app")
@section("content")
<h3 class="btn btn-primary text-white fs-5 p-2">Category</h3>
<div class="modal" id="addcategory" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
        <form action="{{route('admin.addCategory')}}" method="POST">
            @csrf
            
            <div class="form-floating">
                     <input type="text" class="form-control" required   name="name" placeholder="Category Name">
                    <label for="">Category</label>
            </div>
          <button type="submmit" class="btn btn-primary m-2">Add</button>
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
    <button type="button" class="btn btn-primary addCaategoty" value="">
       Add Category
    </button>
    </h4>
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
                    <th> Category Title</th>
                    <th>Total Jobs</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            @if($categories->count() > 0)
                @php
                    $i=0;
                @endphp
              @foreach($categories as $category)
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$category->name}}</td>
                        <td>11</td>
                        <td>{{$category->created_at}}</td>
                        <td>
                        <button type="submmit" class="btn btn-primary m-2">Edit</button>
                        </td>
                      </tr>
              @endforeach
             @else
             <p>No Category is Found</p>
             @endif        
            </tbody>
           
        </table>
    </div>
</div>

@endsection

@section('script')
  <script>
  $(document).ready(function(){
  $('.addCaategoty').click(function (e){
    e.preventDefault();
    var job_id = $(this).val();
    $('#job_id').val(job_id)
    $('#addcategory').modal('show');
  });
});

  </script>
 
@endsection
