    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{asset('templateadmin/images/faces-clipart/pic-1.png')}}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p style="font-size:1rem;" class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small style="font-size:0.95rem;" class="designation text-muted">online</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{asset('home')}}">
              <i class="menu-icon mdi mdi-television"></i>
              <span style="font-size:1rem;" class="menu-title">หน้าหลัก</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-pen"></i>
              <span style="font-size:1rem;" class="menu-title">จัดการเจ้าหน้าที่</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a style="font-size:1rem;" class="nav-link" href="{{route('admin-list')}}">รายการเจ้าหน้าที่</a>
                </li>
                <li class="nav-item">
                  <a style="font-size:1rem;" class="nav-link" href="{{route('register')}}">เพิ่มเจ้าหน้าที่</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin-searchstudent')}}">
              <i class="menu-icon mdi mdi-account-circle"></i>
              <span style="font-size:1rem;" class="menu-title">ค้นหานักศึกษา</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin-searchdocument')}}">
              <i class="menu-icon mdi mdi-clipboard-text"></i>
              <span style="font-size:1rem;" class="menu-title">จัดการรับเอกสาร</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
              <i class="menu-icon mdi mdi-apple-mobileme"></i>
              <span style="font-size:1rem;" class="menu-title">จัดการข่าวสาร</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                <a style="font-size:1rem;" class="nav-link" href="{{route('new-create')}}">เพิ่มข่าวใหม่</a>
                </li>
                <li class="nav-item">
                  <a style="font-size:1rem;" class="nav-link" href="#">แก้ไข & แจ้งข่าว</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
    </nav>