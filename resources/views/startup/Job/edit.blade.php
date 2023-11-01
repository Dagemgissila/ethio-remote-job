@extends("startup.layouts.app")
@section("content")
<div class="row d-flex justify-content-center align-items-center" >
        <div class="col-md-12 p-3 bg-white">
            <div class="" >
                <button class="btn btn-primary">Back</button>
                
                @if ($errors->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ $errors->first('error') }}
                </div>
               @endif
                <form method="POST" action="{{ route('startup.updatejob',$job->id) }}">
                    @csrf
                    <div class="row g-3 my-1">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" value="{{$job->job_title}}"  name="job_title">
                                <label for="">Job Title</label>
                            </div>
                            <div>
                                @error("job_title")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                          
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="salary" value="{{$job->salary}}"  class="form-control">
                                <label for="">Salary</label>
                            </div>
                            @error("salary")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-6">
                            <div class="form-floating">
                                <input type="date" name="deadline" value="{{$job->deadline}}"  class="form-control">
                                <label for="">Deadline</label>
                            </div>
                            @error("deadline")
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                        </div>

                        <div class="col-6">
    <div class="form-floating">
        <select name="category" class="form-select" required name="category">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $job->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="category">Category</label>
    </div>
    @error("category")
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="description" required style="min-height: 150px">{{$job->description}}</textarea>
                                <label for="">Job Description</label>
                            </div>

                            <div>
                                @error("description")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="requirement" required style="min-height: 150px">{{$job->requirement}}</textarea>
                                <label for="">Job Requirement</label>
                            </div>

                            <div>
                                @error("requirement")
                                  <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                     
                        <div class="col-3">
                            <button class="btn btn-primary w-100 p-3" type="submit">Update </button>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
@endsection
