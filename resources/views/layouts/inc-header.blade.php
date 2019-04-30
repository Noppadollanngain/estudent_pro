<!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="{{route('home')}}">
            <img src="{{asset('templateadmin/images/logo.svg')}}" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{route('home')}}">
            <img src="{{asset('templateadmin/images/logo-mini.svg')}}" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span style="font-size:1rem;" class="profile-text">สวัสดี, {{Auth::user()->name}} </span>
                <img class="img-xs rounded-circle" src="{{asset('templateadmin/images/faces-clipart/pic-1.png')}}" alt="Profile image">
              </a>
              <div style="font-size:1rem;" class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
              <a href="{{route('admin-edit',['id'=>Auth::user()->id])}}" class="dropdown-item mt-2">
                  จัดการบัชชี
                </a>
                <a href="{{route('admin-insertdatabase')}}" class="dropdown-item">
                  เพิ่มฐานข้อมูล
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  ออกจากระบบ
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
    </nav>
<!-- partial -->