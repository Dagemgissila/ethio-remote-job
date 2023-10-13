<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom bg-info ">
      <a href="#" class="nav-link flex-column">

        <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
       
          <span class="text-secondary icon-sm text-center text-white">Freelancer</span>
        </div>
      </a>
    </li>


    <li class="pt-2 pb-1">
      <span class="nav-item-head">Navigation link</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('startup.dashboard')}}">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('startup.job')}}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">My Application</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{route('my-profile')}}">
        <i class="mdi mdi-account-group menu-icon"></i>
        <span class="menu-title">My Profile</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/forms/basic_elements.html">
      <i class="mdi mdi-message menu-icon"></i>
        <span class="menu-title">Message</span>
      </a>
    </li>
    
 


    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-account-settings menu-icon"></i>
        <span class="menu-title">Manage Portfolio</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/buttons.html">Add Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/ui-features/dropdowns.html">My Portfolio </a>
          </li>
          
        </ul>
      </div>
    </li>
  </ul>
</nav>
