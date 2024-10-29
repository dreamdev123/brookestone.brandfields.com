<div class="header d-flex align-items-center pr-4">
  <div class="logo">
    <a href="#">
      <img src="{{ asset('images/logo/Brookestone1.svg') }}" style="height: 40px; width: auto;">
    </a>
  </div>
  <div class="toggle-btn-wrapper d-flex">
    <button class="btn bg-transparent shadow-none" type="button" id="sidebarCollapse">
      <i class="fa fa-navicon text-white" style="font-size: 22px;"></i>
    </button>
  </div>

  <div class="form-inline my-2 my-lg-0 ml-auto">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item cursor-pointer">
        <div class="dropdown">
          <div class="nav-link cursor-pointer" id="dropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-fluid img-avatar mr-2" src="{{ asset('images/member_m.png') }}">
            <span class="mr-2 text-white">admin</span>
          </div>
          <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="dropdownMenuUser">
            <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span>Sign Out</span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>