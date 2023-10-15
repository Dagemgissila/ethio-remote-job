<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-chevron-double-left"></span>
      </button>

      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('alljobs')}}">Jobs</a>
        </li>
       
      </ul>

      </ul>
      <ul class="navbar-nav navbar-nav-right">
     
        <li class="nav-item nav-profile dropdown ">
          <a class="nav-link dropdown-toggle p-3" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="nav-profile-image">
              <img src="{{asset('storage/'.auth()->user()->freelancer->profile_image)}}" alt="Profile" class="rounded-circle" style="width: 40px; height: 40px;">
            </div>
            <span class="d-none d-md-block">{{auth()->user()->freelancer->firstname}}</span>
          </a>
          <div class="dropdown-menu center navbar-dropdown xm-2" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
            
                <form action="{{route('logout')}}" method="post">
                    @csrf
                 
                  <a type="button" class="btn" class="dropdown-item">Logout</a>
                </form>
            
          </div>
        </li>
    
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
     
    </div>
  </nav>
