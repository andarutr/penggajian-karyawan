<head>
    <title>@yield('title') - Web Penggajian</title>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}">

   <!-- Theme Config Js -->
    <script src="{{ url('assets/js/config.js') }}"></script>

    <!-- App css -->
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <!-- Begin page -->
    <div class="wrapper">
        @include('partials.topbar')
        @include('partials.sidebar')
        <div class="content-page">
            <div class="content">                  
                @yield('content')
            </div> <!-- content -->

            <footer class="footer footer-alt fw-medium">
                <span class="bg-body">
                    Muhammad Rizaq Rifatulloh
                </span>
            </footer>
        </div>
    </div>
    <!-- END wrapper -->

    <!-- App js -->
    <script src="{{ url('assets/js/vendor.min.js') }}"></script>
    <script src="{{ url('assets/js/app.min.js') }}"></script>

</body>

</html>