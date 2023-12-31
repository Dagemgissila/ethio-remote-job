@extends("admin.layouts.app")
@section("content")
<h3 class="btn btn-primary text-white fs-5 p-2">dashboard</h3>
<div class="bg-white p-4">
    <div class="row">
        <div class="col-xl-3 col-lg-6 col-sm-2">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large">
                        <i class="mdi mdi-account"></i>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 text-white">Total Employer</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                 {{$company + $startup}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-blue-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large">
                       <i class="mdi mdi-account"></i>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 text-white">Licensed Company</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$company}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 text-white">Start Up Company</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$startup}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cyan-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0 text-white">Total Freelancer</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$freelancer}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <h5 class="card-title mb-0 text-white">Blocked  Account</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                {{$blocked}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
