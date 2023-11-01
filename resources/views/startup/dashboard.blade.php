@extends("startup.layouts.app")
@section("content")
<h3 class="btn btn-primary text-white fs-5 p-2">dashboard</h3>
<div class="bg-white p-4">
    <div class="row">
  
    

        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 text-white">Total Posted Job</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                            {{$jobs}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-red-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large">
                        <i class="fas fa-ban"></i>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 text-white">Blocked Jobs</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$blockjob}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
