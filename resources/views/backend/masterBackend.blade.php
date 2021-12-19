<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <link rel="apple-touch-icon" href="apple-icon.png"> --}}
    {{-- <link rel="shortcut icon" href="{{ asset('assets/img/Logo-Puskesmas.png') }}"> --}}

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets//css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/backend.css') }}">
    @yield('selec-2')
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>


    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>

<body>


    @include('backend.layouts.sidebar')

    @include('backend.layouts.header')

    @yield('backend')


</body>




<script src="//cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
{{-- <script src="{{ asset('assets/js/Chart.bundle.min.js') }}"></script>
--}}
{{-- <script src="{{ asset('assets/js/dashboard.js') }}"></script>
--}}
{{-- <script src="{{ asset('assets/js/widgets.js') }}"></script>
--}}
{{-- <script src="{{ asset('assets/js/jquery.vmap.world.js') }}"></script>
--}}

@yield('js-select-2')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

{{-- datatable --}}
<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatables-init.js')}}"></script>
@yield('js')

</html>
