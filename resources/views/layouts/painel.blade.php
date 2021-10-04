<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title . ' - ' . 'SYSCRM' : 'SYSCRM' }}
    </title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Nunito+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset(mix('assets/css/app.css')) }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/ionicons/dist/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/icon-kit/dist/css/iconkit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset(mix('assets/css/theme.css')) }}">
    @yield('css')

    <style>
        #loading {
            position: fixed;
            display: flex;
            top: 0;
            left: 0;
            align-items: center;
            justify-content: center;
            width: 100vw;
            height: 100vh;
            background: #fff;
            z-index: 9999;
        }

    </style>

    <script src="{{ asset('assets/js/vendor/modernizr.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div id="loading">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div><!-- #load -->

    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container-fluid">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none">
                            <i class="fas fa-bars"></i>
                        </button>
                        <!--<div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>-->
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i
                                class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="notiDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="ik ik-bell"></i><span class="badge bg-danger">3</span></a>
                            <div class="dropdown-menu dropdown-menu-right notification-dropdown"
                                aria-labelledby="notiDropdown">
                                <h4 class="header">Notificações</h4>
                                <div class="notifications-wrap">
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-check"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Invitation accepted</span>
                                            <span class="media-content">Your have been Invited ...</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <img src="{{ asset('assets/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">Steve Smith</span>
                                            <span class="media-content">I slowly updated projects</span>
                                        </span>
                                    </a>
                                    <a href="#" class="media">
                                        <span class="d-flex">
                                            <i class="ik ik-calendar"></i>
                                        </span>
                                        <span class="media-body">
                                            <span class="heading-font-family media-heading">To Do</span>
                                            <span class="media-content">Meeting with Nathan on Friday 8 AM ...</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="footer"><a href="javascript:void(0);">Ver tudo</a></div>
                            </div>
                        </div>
                        <button type="button" class="nav-link ml-10 right-sidebar-toggle"><i
                                class="ik ik-message-square"></i><span class="badge bg-success">3</span></button>
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="menuDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="ik ik-plus"></i></a>
                            <div class="dropdown-menu dropdown-menu-right menu-grid" aria-labelledby="menuDropdown">
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Dashboard"><i class="ik ik-bar-chart-2"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Message"><i class="ik ik-mail"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Accounts"><i class="ik ik-users"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Sales"><i class="ik ik-shopping-cart"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Purchase"><i class="ik ik-briefcase"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Pages"><i class="ik ik-clipboard"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Chats"><i class="ik ik-message-square"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Contacts"><i class="ik ik-map-pin"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Blocks"><i class="ik ik-inbox"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Events"><i class="ik ik-calendar"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="Notifications"><i class="ik ik-bell"></i></a>
                                <a class="dropdown-item" href="#" data-toggle="tooltip" data-placement="top"
                                    title="More"><i class="ik ik-more-horizontal"></i></a>
                            </div>
                        </div>
                        <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal"
                            data-target="#appsModal"><i class="ik ik-grid"></i></button>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"><img class="avatar"
                                    src="{{ asset('assets/img/user.png') }}" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profile.html"><i class="ik ik-user dropdown-icon"></i>
                                    Perfil</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-settings dropdown-icon"></i>
                                    Configurações</a>
                                <a class="dropdown-item" href="#"><span class="float-right"><span
                                            class="badge badge-primary">6</span></span><i
                                        class="ik ik-mail dropdown-icon"></i> Inbox</a>
                                <a class="dropdown-item" href="#"><i class="ik ik-navigation dropdown-icon"></i>
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
        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header">
                    <a class="header-brand" href="{{ route('painel.dashboard.index') }}">
                        <div class="logo-img">
                            <!--<img src="{{ asset('assets/img/logo-mobile.png') }}" class="header-brand-img" width="30"
                                alt="Logo Mentora Soluções">-->
                            <span class="text text-uppercase">
                                SysCRM
                            </span>
                        </div>
                    </a>
                    <button type="button" class="nav-toggle">
                        <i data-toggle="expanded" class="ik toggle-icon ik-toggle-right"></i>
                    </button>
                </div>

                <div class="sidebar-content">
                    <div class="nav-container">
                        <nav id="main-menu-navigation" class="navigation-main">
                            <div
                                class="nav-item {{ request()->is('painel') || request()->is('painel/dashboard') ? 'active' : null }}">
                                <a href="{{ route('painel.dashboard.index') }}">
                                    <i class="ik ik-bar-chart-2"></i>
                                    <span>Dashboard</span>
                                </a>
                            </div>
                            <div
                                class="nav-item has-sub {{ request()->is('painel/clientes') || request()->is('painel/curstomers/*') ? 'active open' : null }}">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-users"></i><span>Clientes</span>
                                </a>
                                <div class="submenu-content">
                                    <a href="{{ route('painel.customers.index') }}"
                                        class="menu-item {{ request()->is('painel/clientes') || Route::is('customers.show') ? 'active' : null }}">Gerenciar
                                        Clientes</a>
                                </div>
                                <div class="submenu-content">
                                    <a href="" class="menu-item">Contratos</a>
                                </div>
                            </div>
                            <div
                                class="nav-item has-sub {{ request()->is('painel/leads') || request()->is('painel/leads/*') ? 'active open' : null }}">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-store"></i><span>Leads</span>
                                </a>
                                <div class="submenu-content">
                                    <a href="{{ route('painel.leads.index') }}"
                                        class="menu-item {{ request()->is('painel/leads') || Route::is('painel.leads.show') ? 'active' : null }}">Gerenciar
                                        Leads</a>
                                </div>
                                <div class="submenu-content">
                                    <a href="{{ route('painel.leads.contacts.index') }}"
                                        class="menu-item {{ request()->is('painel/leads/contatos') ? 'active' : null }}">Histórico
                                        de Contatos</a>
                                </div>
                                <div class="submenu-content">
                                    <a href="{{ route('painel.leads.appointments.index') }}"
                                        class="menu-item {{ request()->is('painel/leads/compromissos') ? 'active' : null }}">Compromissos</a>
                                </div>
                            </div>
                            <div class="nav-item {{ request()->is('painel/filiais') ? 'active' : null }}">
                                <a href="{{ route('painel.branches.index') }}">
                                    <i class="fas fa-user-tie"></i>
                                    <span>Filiais</span>
                                </a>
                            </div>
                            <div class="nav-item {{ request()->is('painel/usuarios') ? 'active' : null }}">
                                <a href="{{ route('painel.users.index') }}">
                                    <i class="fas fa-user-cog"></i>
                                    <span>Usuários</span>
                                </a>
                            </div>
                            <div class="nav-item has-sub
                                    {{ request()->is('painel/origens') || request()->is('painel/origens/*') || request()->is('painel/status') || request()->is('painel/status/*') ? 'active open' : null }}
                                ">
                                <a href="javascript:void(0)">
                                    <i class="fas fa-cogs"></i><span>Configurações</span>
                                </a>
                                <div class="submenu-content">
                                    <a href="{{ route('painel.sources.index') }}"
                                        class="menu-item {{ request()->is('painel/origens') || request()->is('painel/origens/*') ? 'active' : null }}">Origens</a>
                                </div>
                                <div class="submenu-content">
                                    <a href="{{ route('painel.status.index') }}"
                                        class="menu-item {{ request()->is('painel/status') || request()->is('painel/status/*') ? 'active' : null }}">Status
                                        Leads e Clientes</a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="main-content">
                <!-- Conteúdo -->
                <div class="container-fluid">

                    @yield('page-header')

                    @yield('content')

                </div>
                <!-- Final do Conteúdo -->
            </div>
            <aside class="right-sidebar">
                <div class="sidebar-chat" data-plugin="chat-sidebar">
                    <div class="sidebar-chat-info">
                        <h6>Chat List</h6>
                        <form class="mr-t-10">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Buscar amigos ...">
                                <i class="ik ik-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="chat-list">
                        <div class="list-group row">
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                                <figure class="user--online">
                                    <img src="{{ asset('assets/img/users/1.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Gene Newman</span> <span
                                        class="username">@gene_newman</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
                                <figure class="user--online">
                                    <img src="{{ asset('assets/img/users/2.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Billy Black</span> <span
                                        class="username">@billyblack</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
                                <figure class="user--online">
                                    <img src="{{ asset('assets/img/users/3.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Herbert Diaz</span> <span
                                        class="username">@herbert</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
                                <figure class="user--busy">
                                    <img src="{{ asset('assets/img/users/4.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Sylvia Harvey</span> <span
                                        class="username">@sylvia</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
                                <figure class="user--busy">
                                    <img src="{{ asset('assets/img/users/5.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Marsha Hoffman</span> <span
                                        class="username">@m_hoffman</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
                                <figure class="user--offline">
                                    <img src="{{ asset('assets/img/users/1.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Mason Grant</span> <span
                                        class="username">@masongrant</span> </span>
                            </a>
                            <a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
                                <figure class="user--offline">
                                    <img src="{{ asset('assets/img/users/2.jpg') }}" class="rounded-circle" alt="">
                                </figure><span><span class="name">Shelly Sullivan</span> <span
                                        class="username">@shelly</span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="chat-panel" hidden>
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                        <span class="user-name">John Doe</span>
                        <button type="button" class="close" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="card-body">
                        <div class="widget-chat-activity flex-1">
                            <div class="messages">
                                <div class="message media reply">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/users/3.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>Epic Cheeseburgers come in all kind of styles.</p>
                                    </div>
                                </div>
                                <div class="message media">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>Cheeseburgers make your knees weak.</p>
                                    </div>
                                </div>
                                <div class="message media reply">
                                    <figure class="user--offline">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/users/5.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>Cheeseburgers will never let you down.</p>
                                        <p>They'll also never run around or desert you.</p>
                                    </div>
                                </div>
                                <div class="message media">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>A great cheeseburger is a gastronomical event.</p>
                                    </div>
                                </div>
                                <div class="message media reply">
                                    <figure class="user--busy">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/users/5.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>There's a cheesy incarnation waiting for you no matter what you palete
                                            preferences are.</p>
                                    </div>
                                </div>
                                <div class="message media">
                                    <figure class="user--online">
                                        <a href="#">
                                            <img src="{{ asset('assets/img/users/1.jpg') }}" class="rounded-circle"
                                                alt="">
                                        </a>
                                    </figure>
                                    <div class="message-body media-body">
                                        <p>If you are a vegan, we are sorry for you loss.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="javascript:void(0)" class="card-footer" method="post">
                        <div class="d-flex justify-content-end">
                            <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                            <button class="btn btn-icon" type="submit"><i
                                    class="ik ik-arrow-right text-success"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="footer">
                <div class="w-100 clearfix">
                    <span class="text-center text-sm-left d-md-inline-block">Copyright &copy;
                        {{ Carbon\Carbon::now()->format('Y') }}. Todos os direitos reservados.</span>
                    <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">Criado com <i
                            class="fa fa-heart text-danger"></i> por <a href="https://github.com/bholiveiradev"
                            class="text-dark" target="_blank">Bruno Oliveira</a></span>
                </div>
            </footer>
        </div>
    </div>

    <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel"
        aria-hidden="true" data-backdrop="false">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                class="ik ik-x-circle"></i></button>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <!--<div class="quick-search">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4 ml-auto mr-auto">
                                <div class="input-wrap">
                                    <input type="text" id="quick-search" class="form-control"
                                        placeholder="Buscar ..." />
                                    <i class="ik ik-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="modal-body d-flex align-items-center">
                    <div class="container">
                        <div class="apps-wrap">
                            <div class="app-item">
                                <a href="{{ route('painel.dashboard.index') }}"><i
                                        class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                            </div>
                            <div class="app-item dropdown">
                                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="ik ik-command"></i><span>Ui</span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                            </div>
                            <div class="app-item">
                                <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset(mix('assets/js/app.js')) }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/screenfull/dist/screenfull.js') }}"></script>
    <script src="{{ asset(mix('assets/js/theme.js')) }}"></script>
    <script src="{{ asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.5/jquery.inputmask.min.js"></script>
    <script src="{{ asset('assets/plugins/select2/dist/js/select2.min.js') }}"></script>
    @yield('js')

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b, o, i, l, e, r) {
            b.GoogleAnalyticsObject = l;
            b[l] || (b[l] =
                function() {
                    (b[l].q = b[l].q || []).push(arguments)
                });
            b[l].l = +new Date;
            e = o.createElement(i);
            r = o.getElementsByTagName(i)[0];
            e.src = 'https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e, r)
        }(window, document, 'script', 'ga'));
        ga('create', 'UA-XXXXX-X', 'auto');
        ga('send', 'pageview');

        function retorno(data) {
            if (!data.erro) {
                $('input[name=address]').val(data.logradouro);
                $('input[name=district]').val(data.bairro);
                $('input[name=city]').val(data.localidade);
                $('select[name=state]').val(data.uf).trigger('change');
            }
        }

        $(function() {
            var table = $('#data_table').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json'
                },
                responsive: true,
                select: true,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': ['nosort']
                }]
            });

            $('input[name=zipcode]').on('blur', function() {
                let cep = $(this).val().replace(/\D/g, '');

                if (cep !== '' && cep !== 'undefined') {
                    let validacep = /^[0-9]{8}$/;

                    if (validacep.test(cep)) {
                        let script = document.createElement('script');
                        script.src = `https://viacep.com.br/ws/${cep}/json/?callback=retorno`;
                        document.body.appendChild(script);
                    }
                }
            });

            // Consulta dados do cnpj na receita e preenche automaticamente os campos
            $('input[name=document]').on('blur', function() {
                let document = $(this).val().replace(/\D/g, '');
                let url = 'https://www.receitaws.com.br/v1/cnpj/' + document;

                $.ajax({
                    method: 'GET',
                    url: url,
                    dataType: 'jsonp',
                    success: function(result) {
                        if (result.status === 'OK') {
                            $('[name=name]').val(result.nome);
                            $('[name=alias]').val(result.fantasia);
                            $('[name=phone]').val(result.telefone);
                            $('[name=email]').val(result.email);
                            $('[name=zipcode]').val(result.cep);
                            $('[name=address]').val(result.logradouro);
                            $('[name=number]').val(result.numero);
                            $('[name=district]').val(result.bairro);
                            $('[name=complement]').val(result.complemento);
                            $('[name=city]').val(result.municipio);
                            $('[name=state]').val(result.uf).change();
                        }
                    }
                });
            });

            $('input[name=phone]').inputmask("(99) 9999-9999");
            $('input[name=celphone]').inputmask("(99) 9 9999-9999");
            $('input[name=zipcode]').inputmask("99999-999");
            $('input[name=document]').inputmask({
                mask: ["999.999.999-99", "99.999.999/9999-99"]
            });

            $('.select2').select2({
                width: 'resolve'
            });
        });

        $(window).on('load', function() {
            $('#loading').fadeOut(300, function() {
                $('#loading').remove();
            });
        });
    </script>
</body>

</html>
