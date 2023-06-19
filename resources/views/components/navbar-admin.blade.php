<nav class="navbar navbar-main navbar-expand-lg py-3  shadow-none " id="navbarBlur" navbar-scroll="true"
    style="background-color: #1363DF">
    <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 " id="navbar">
            <ul class="navbar-nav ms-auto justify-content-end">
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-user" style="color: #ffffff"></i>
                        <span class="d-sm-inline d-none text-light fw-bold ms-2">Hi, Admin</span>
                        {{-- <span class="d-sm-inline d-none">{{ 'auth()->user()->name' }}</span> --}}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ url('gantiPassword') }}">
                                <i class="fas fa-key fa-sm me-2"></i>Ubah Password
                            </a>
                        </li>
                        <hr>
                        <li>
                            <form action="{{ url('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm me-2"></i>Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="card my-3 mx-4 d-flex justify-content-center">
    <div class="card-body">
        <h4 class="my-0"> {{ $title }} </h4>
    </div>
</div>
