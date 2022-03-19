@include('admin.layouts.header')
<body class="sb-nav-fixed">

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

<div id="layoutSidenav">



@yield('content')

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{ asset('design/js/scripts.js') }}"></script>
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
@stack('js')
</body>
</html>
