<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
  <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
  <img src="{{asset('home/img/logo.jpg')}}" alt="Profile" class="rounded-circle" style="width: 100px; height: 100px;">
    <h1 class="m-0 text-secondary">Maroset</h1>
  </a>
  <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse mx-5" id="navbarCollapse">
    <div class="navbar-nav ms-auto p-4 p-lg-0">
      <a href="/" class="nav-item nav-link {{request()->is('/') ? 'active' : 'null'}}">Home</a>
      <a href="{{route('alljobs')}}" class="nav-item nav-link {{request()->is('jobs') ? 'active' : 'null' }}">Jobs</a>
      <a href="{{route('freelancer')}}" class="nav-item nav-link  {{request()->is('freelancer') ? 'active' : 'null' }}">Freelancer</a>
      @auth
         @if(auth()->user()->roles()->pluck("name")->first() == "jobseeker")
         
         <div class="nav-item dropdown d-md-flex align-items-center justify-content-center">
   
        <img src="{{ auth()->user()->freelancer->profile_image ? asset('storage/' . auth()->user()->freelancer->profile_image) : asset('storage/profileImage/avater.jpg') }}" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
        {{ auth()->user()->freelancer->firstname . " " .  auth()->user()->freelancer->lastname ?? '' }}
    </a>
    <div class="dropdown-menu rounded-0 m-0">
        <a class="dropdown-item" href="/{{ Auth::user()->roles->pluck('name')->first() }}/dashboard">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a href="job-detail.html" class="dropdown-item">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button>logout</button>
            </form>
        </a>
    </div>
</div>

          
                    @elseif(auth()->user()->roles()->pluck("name")->first() == "company")
                    <div class="nav-item dropdown  d-md-flex align-items-center justify-content-center">
      <img src="{{asset('storage/'.auth()->user()->company->logo)}}" alt="Profile" class="rounded-circle d-none d-md-block" style="width: 50px; height: 50px;">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{auth()->user()->company->company_name}}</a>
                        <div class="dropdown-menu rounded-0 m-0">
                        <a class="dropdown-item" href="/{{Auth::user()->roles->pluck('name')->first()}}/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
                            <a href="job-detail.html" class="dropdown-item">
                            <form action="{{route('logout')}}" method="post">
        @csrf
       <button class="btn btn-secondary d-block">logout</button>
      </form>
                            </a>
                        </div>
                    </div>
                 
                    
                    @elseif(auth()->user()->roles()->pluck("name")->first() == "admin")
                    <div class="nav-item dropdown  d-md-flex align-items-center justify-content-center">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{auth()->user()->email}}</a>
                        <div class="dropdown-menu rounded-0 m-0">
                        <a class="dropdown-item" href="/{{Auth::user()->roles->pluck('name')->first()}}/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
                            <a href="job-detail.html" class="dropdown-item">
                            <form action="{{route('logout')}}" method="post">
                         @csrf
                       <button class="btn btn-secondary d-block">logout</button>
                         </form>
                            </a>
                        </div>
                    </div>
                    @elseif(auth()->user()->roles()->pluck("name")->first() == "startup")
                    <div class="nav-item dropdown  d-md-flex align-items-center justify-content-center">

                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        {{auth()->user()->email}}</a>
                        <div class="dropdown-menu rounded-0 m-0">
                        <a class="dropdown-item" href="/{{Auth::user()->roles->pluck('name')->first()}}/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a>
                            <a href="job-detail.html" class="dropdown-item">
                            <form action="{{route('logout')}}" method="post">
                         @csrf
                       <button class="btn btn-secondary d-block">logout</button>
                         </form>
                            </a>
                        </div>
                    </div>
                    @endif

                 

           

      @endauth
    </div>
  </div>
  @guest
  <div class="d-flex">
    <a href="{{route('login')}}" class="login-btn btn-secondary rounded-1 mx-1 d-flex text-center align-items-center justify-content-center">Login</a>
    <a href="{{route('register')}}" class="register-btn btn-secondary d-flex text-center align-items-center justify-content-center">Register</a>
  </div>
  @endguest
</nav>
<!-- Navbar End -->
