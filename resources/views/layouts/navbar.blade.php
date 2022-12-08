<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{ route('products.index') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('images/devstore 2.png')}}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('images/devstore 2.png')}}" alt="" height="30">
                    </span>
                </a>

                <a href="{{ route('products.index') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('images/devstore 2.png')}}" alt="" height="30">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('images/devstore 2.png')}}" alt="" height="30">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>




        </div>

        <div class="d-flex">


            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>



            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('img/avatars/'.Auth::user()->avatar)}}"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Auth::user()->name}}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="{{route('Auth.profile')}}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Perfil</span></a>

                    <div class="dropdown-divider"></div>
                    <form method="post" action="{{  url('logout')}}">
                        @csrf
                        <button class="dropdown-item text-danger" type="submit"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Cerrar sesión</span></button>
                    </form>

                </div>
            </div>


        </div>
    </div>
</header>

