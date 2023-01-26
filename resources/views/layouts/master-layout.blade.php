@include('../includes/compatibility')
<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="description" content="">
@include('../includes/style')
<meta charset='utf-8' />
</head>

<body data-layout="detached" data-topbar="colored">

    <div class="container-fluid">
        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('../includes/header')
            @include('../includes/sidebar')

            @yield('content')

            
        </div>
        <!-- END layout-wrapper -->

    </div>
    @include('../includes/scripts')
    @yield('custom_script')
</body>

</html>
