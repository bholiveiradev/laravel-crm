<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title . ' | ' . 'SYSCRM' : 'SYSCRM' }}
    </title>

    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />

    @include('layouts.includes.css')

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
        @include('layouts.includes.header-wrapper')
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
                @include('layouts.includes.menu-sidebar')
            </div>
            <div class="main-content">
                <!-- Conteúdo -->
                <div class="container-fluid">

                    @yield('page-header')

                    @yield('content')

                </div>
                <!-- Final do Conteúdo -->
            </div>
            @include('layouts.includes.right-sidebar')
            @include('layouts.includes.chat')
            @include('layouts.includes.footer-wrapper')            
        </div>
    </div>
    @include('layouts.includes.apps-modal')
    @include('layouts.includes.js')
</body>

</html>
