
      <!-- Navbar Start -->
      <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <img src="img/logo.jpg" alt="" height="50" weight="50">
            <h1 class="m-0 text-secondary">EthioRemoteJobs</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link active">Home</a>
                <a href="{{route('alljobs')}}" class="nav-item nav-link">Jobs</a>
                <a href="about.html" class="nav-item nav-link">Freelancer</a>

                @auth
                <a href="{{Auth::user()->roles->pluck("name")->first()}}/dashboard" class="nav-item nav-link">Dashboard</a>
               @endauth
            </div>
        </div>
        @guest
        <div class="d-flex">
            <a href="{{route('login')}}" class="login-btn btn-secondary rounded-1 mx-1 d-flex text-center align-items-center justify-content-center ">Login</a>
            <a href="{{route('register')}}" class="register-btn btn-secondary d-flex text-center align-items-center justify-content-center">Register</a>
          </div>
        @endguest

    </nav>
    <!-- Navbar End -->
