<header class="header-top" header-theme="light">
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <div class="top-menu d-flex align-items-center">
                <button type="button" class="btn-icon mobile-nav-toggle d-lg-none">
                    <i class="fas fa-bars"></i>
                </button>
                <!--
                <div class="header-search">
                    <div class="input-group">
                        <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                        <input type="text" class="form-control">
                        <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                    </div>
                </div>
                -->
                <button type="button" id="navbar-fullscreen" class="nav-link"><i
                        class="ik ik-maximize"></i></button>
            </div>
            <div class="top-menu d-flex align-items-center">

                @include('layouts.includes.header-notification')

                <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i class="ik ik-message-square"></i><span
                    class="badge bg-success">3</span></button>

                <!--
                @include('layouts.includes.header-icons-apps')
                -->
                
                <!--
                <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal"
                    data-target="#appsModal"><i class="ik ik-grid"></i></button>
                -->
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><img class="avatar"
                            src="{{ asset('assets/img/user.png') }}" alt=""></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href=""><i class="ik ik-user dropdown-icon"></i>
                            Perfil</a>
                        <a class="dropdown-item" href=""><i class="ik ik-settings dropdown-icon"></i>
                            Configurações</a>
                        <a class="dropdown-item" href=""><span class="float-right"><span
                                    class="badge badge-primary">6</span></span><i
                                class="ik ik-mail dropdown-icon"></i> Inbox</a>
                        <a class="dropdown-item" href=""><i class="ik ik-navigation dropdown-icon"></i>
                            Message</a>
                        <a class="dropdown-item"
                            onclick="event.preventDefault();document.getElementById('form-logout').submit()"
                            href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i>
                            Logout</a>
                        <form id="form-logout" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>