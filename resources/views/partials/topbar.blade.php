<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">

           
            <div class="logo-topbar">
                
                <a href="index.php" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{ url('assets/images/logo.png') }}" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ url('assets/images/logo-sm.png') }}" alt="small logo">
                    </span>
                </a>

                
                <a href="index.php" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{ url('assets/images/logo-dark.png') }}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ url('assets/images/logo-sm.png') }}" alt="small logo">
                    </span>
                </a>
            </div>

            
            <button class="button-toggle-menu">
                <i class="ri-menu-2-fill"></i>
            </button>

            
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>

        <ul class="topbar-menu d-flex align-items-center gap-3">
            <li class="dropdown d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ri-search-line fs-22"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                    <form class="p-3">
                        <input type="search" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="ri-notification-3-line fs-22"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg py-0">
                    <div class="p-2 border-top-0 border-start-0 border-end-0 border-dashed border">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0 fs-16 fw-semibold"> Notifikasi</h6>
                            </div>
                        </div>
                    </div>

                    <div style="max-height: 300px;" data-simplebar>

                        <h5 class="text-muted fs-12 fw-bold p-2 text-uppercase mb-0">{{ date('d F Y') }}</h5>
                        

                        <a href="javascript:void(0);" class="dropdown-item p-0 notify-item unread-noti card m-0 shadow-none">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="notify-icon bg-primary">
                                            <i class="ri-message-3-line fs-18"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 text-truncate ms-2">
                                        <h5 class="noti-item-title fw-semibold fs-14">System <small class="fw-normal text-muted float-end ms-1">1 min ago</small></h5>
                                        <small class="noti-item-subtitle text-muted">Selamat Datang {{ Auth::user()->nama_lengkap }}</small>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </li>

            <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left" title="Theme Mode">
                    <i class="ri-moon-line fs-22"></i>
                </div>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{ url('assets/images/users') }}/{{ Auth::user()->picture }}" alt="user-image" width="32" class="rounded-circle">
                    </span>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0">{{ Auth::user()->nama_lengkap }}</h5>
                        <h6 class="my-0 fw-normal">@if(Auth::user()->role_id === 1) Admin @else Karyawan @endif</h6>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">
                    
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome !</h6>
                    </div>

                    
                    <a href="{{ url(Request::segment(1)) }}/settings/profile" class="dropdown-item">
                        <i class="ri-account-circle-line fs-18 align-middle me-1"></i>
                        <span>My Account</span>
                    </a>

                    
                    <a href="{{ url(Request::segment(1)) }}/settings/change-password" class="dropdown-item">
                        <i class="ri-settings-4-line fs-18 align-middle me-1"></i>
                        <span>Change Password</span>
                    </a>
                    <form action="{{ url('logout') }}" method="POST">@csrf
                        <button type="submit" class="dropdown-item">
                            <i class="ri-logout-box-line fs-18 align-middle me-1"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>