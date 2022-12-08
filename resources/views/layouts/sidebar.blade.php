<div class="vertical-menu">

    <div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Menú</li>
            {{-- <li>
                <a href="{{ route('auth.home') }}" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-projects">Home</span>
                </a>

            </li> --}}

            <li>
                <a href="{{ route('products.index') }}" class="waves-effect">
                    <i class="bx bx-briefcase-alt-2"></i>
                    <span key="t-projects">Productos</span>
                </a>

            </li>

            <li>
                <a href="{{ route('users.index') }}" class="waves-effect">
                    <i class="bx bxs-user-detail"></i>
                    <span key="t-contacts">Usuarios</span>
                </a>

            </li>

            <li>
                <a href="{{ route('clients.index') }}" class="waves-effect">
                    <i class="bx bx-user-circle"></i>
                    <span key="t-authentication">Clientes</span>
                </a>

            </li>

            <li>
                <a href="{{ route('coupons.index') }}" class="waves-effect">
                    <i class="bx bx-receipt"></i>
                    <span key="t-invoices">Cupones</span>
                </a>

            </li>

            <li>
                <a href="{{ route('orders.index') }}" class="waves-effect">
                    <i class="bx bx-file"></i>
                    <span key="t-utility">Ordenes</span>
                </a>

            </li>

            <li>
                <a href="{{ route('categories.index') }}" class="waves-effect">
                    <i class="bx bx-list-ul"></i>
                    <span key="t-tables">Categorías</span>
                </a>

            </li>

            <li>
                <a href="{{ route('brands.index') }}" class="waves-effect">
                    <i class="bx bx-aperture"></i>
                    <span key="t-icons">Marcas</span>
                </a>

            </li>

            {{-- <li>
                <a href="{{ route('primes.index') }}" class="waves-effect">
                    <i class="bx bxs-eraser"></i>

                    <span key="t-forms">Materia Prima</span>
                </a>

            </li> --}}


            <li>
                <a href="{{ route('prime.inventario') }}" class="waves-effect">
                    <i class="bx bx-task"></i>
                    <span key="t-tasks">Inventario</span>
                </a>
            </li>
        </ul>
        <!-- Sidebar -->
    </div>
    </div>
</div>
