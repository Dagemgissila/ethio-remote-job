<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile border-bottom bg-info ">
      <a href="#" class="nav-link flex-column">
       
        <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
        
          <span class="text-secondary icon-sm text-center text-white">Admin</span>
        </div>
      </a>
    </li>
    
    <li class="pt-2 pb-1">
      <span class="nav-item-head">Navigation link</span>
    </li>
    <li class="nav-item ">
      <a class="nav-link" href="{{route('admin.dashboard')}}">
        <i class="mdi mdi-view-dashboard menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.category')}}">
        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        <span class="menu-title">Category</span>
      </a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.company')}}">
        <i class="mdi mdi-domain menu-icon"></i>
        <span class="menu-title">Companies</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.startUp')}}">
        <i class="mdi mdi-rocket menu-icon"></i>
        <span class="menu-title">Startups</span>
      </a>
    </li>
  

    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.reportedJob')}}">
        <i class="mdi mdi-alert menu-icon"></i>
        <span class="menu-title">Reported Jobs</span>
      </a>
    </li>

  </ul>
</nav>
