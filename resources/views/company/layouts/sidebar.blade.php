<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom bg-info ">
      <a href="#" class="nav-link flex-column">

        <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
       
          <span class="text-secondary icon-sm text-center text-white">Company</span>
        </div>
      </a>
    </li>


    <li class="pt-2 pb-1">
      <span class="nav-item-head">Navigation link</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('company.dashboard')}}">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('company.job')}}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">Jobs</span>
      </a>
    </li>
    <li class="nav-item">
  <a class="nav-link" href="{{route('company.profile')}}">
    <i class="mdi mdi-account menu-icon"></i>
    <span class="menu-title">Profile</span>
  </a>
</li>

    <li class="nav-item">
  <a class="nav-link" href="{{route('company.changePassword')}}">
    <i class="mdi mdi-lock menu-icon"></i>
    <span class="menu-title">Change Password</span>
  </a>
</li>

    

  
  
  </ul>
</nav>
