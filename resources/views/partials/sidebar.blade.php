<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">
  <!-- Brand Logo Light -->
  <a href="index.php" class="logo logo-light mt-3">
    <span class="logo-lg">
      <img src="{{ url('assets/images/logo.png') }}" alt="logo" />
    </span>
    <span class="logo-sm">
      <img src="{{ url('assets/images/logo-sm.png') }}" alt="small logo" />
    </span>
  </a>

  <!-- Brand Logo Dark -->
  <a href="index.php" class="logo logo-dark mt-3">
    <span class="logo-lg">
      <img src="{{ url('assets/images/logo-dark.png') }}" alt="dark logo" />
    </span>
    <span class="logo-sm">
      <img src="{{ url('assets/images/logo-sm.png') }}" alt="small logo" />
    </span>
  </a>

  <!-- Sidebar Hover Menu Toggle Button -->
  <div
    class="button-sm-hover"
    data-bs-toggle="tooltip"
    data-bs-placement="right"
    title="Show Full Sidebar"
  >
    <i class="ri-checkbox-blank-circle-line align-middle"></i>
  </div>

  <!-- Full Sidebar Menu Close Button -->
  <div class="button-close-fullsidebar">
    <i class="ri-close-fill align-middle"></i>
  </div>

  <!-- Sidebar -left -->
  <div class="h-100" id="leftside-menu-container" data-simplebar>
    <!-- Leftbar User -->
    <div class="leftbar-user">
      <a href="pages-profile.php">
        <img
          src="assets/images/users/avatar-1.jpg"
          alt="user-image"
          height="42"
          class="rounded-circle shadow-sm"
        />
        <span class="leftbar-user-name mt-2">{{ Auth::user()->nama_lengkap }}</span>
      </a>
    </div>

    <!--- Sidemenu -->
    <ul class="side-nav">
      <li class="side-nav-title mt-3">Apps</li>
      @if(Auth::user()->role->role === 'Karyawan')
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1)) }}" class="side-nav-link">
          <i class="ri-home-4-line"></i>
          <span> Dashboard </span>
        </a>
      </li>


      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/absensi') }}" class="side-nav-link">
          <i class="ri-calendar-event-line"></i>
          <span> Absen </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/rincian-gaji') }}" class="side-nav-link">
          <i class="ri-list-check-3"></i>
          <span> Rincian Gaji </span>
        </a>
      </li>
      @else
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1)) }}" class="side-nav-link">
          <i class="ri-home-4-line"></i>
          <span> Dashboard </span>
        </a>
      </li>
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/absensi') }}" class="side-nav-link">
          <i class="ri-fingerprint-line"></i>
          <span> Absensi </span>
        </a>
      </li>
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/penggajian') }}" class="side-nav-link">
          <i class="ri-cash-line"></i>
          <span> Penggajian </span>
        </a>
      </li>
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/account') }}" class="side-nav-link">
          <i class="ri-folder-user-line"></i>
          <span> Account </span>
        </a>
      </li>
      <li class="side-nav-title mt-1">Other</li>
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/divisi') }}" class="side-nav-link">
          <i class="ri-creative-commons-by-fill"></i>
          <span> Divisi </span>
        </a>
      </li>
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/jabatan') }}" class="side-nav-link">
          <i class="ri-briefcase-line"></i>
          <span> Jabatan </span>
        </a>
      </li>
      <li class="side-nav-item">
        <a href="{{ url(Request::segment(1).'/role') }}" class="side-nav-link">
          <i class="ri-shield-keyhole-line"></i>
          <span> Role </span>
        </a>
      </li>
      @endif

    </ul>
    <!--- End Sidemenu -->

    <div class="clearfix"></div>
  </div>
</div>
<!-- ========== Left Sidebar End ========== -->
