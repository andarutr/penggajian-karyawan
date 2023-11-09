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

      <li class="side-nav-item">
        <a href="apps-calendar.php" class="side-nav-link">
          <i class="ri-home-4-line"></i>
          <span> Dashboard </span>
        </a>
      </li>


      <li class="side-nav-item">
        <a href="apps-calendar.php" class="side-nav-link">
          <i class="ri-calendar-event-line"></i>
          <span> Absen </span>
        </a>
      </li>

      <li class="side-nav-item">
        <a href="apps-chat.php" class="side-nav-link">
          <i class="ri-list-check-3"></i>
          <span> Rincian Gaji </span>
        </a>
      </li>
    </ul>
    <!--- End Sidemenu -->

    <div class="clearfix"></div>
  </div>
</div>
<!-- ========== Left Sidebar End ========== -->
