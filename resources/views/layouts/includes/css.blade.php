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