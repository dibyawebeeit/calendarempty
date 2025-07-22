<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        @if (View::hasSection('title'))
            @yield('title')
        @else
            Dashboard
        @endif - {{ config('app.name', 'Laravel') }}
    </title>

    <meta name="description" content="{{ $description ?? '' }}">
    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="author" content="{{ $author ?? '' }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Vite CSS --}}
    {{-- {{ module_vite('build-dashboard', 'resources/assets/sass/app.scss') }} --}}

    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">

    <script src="{{ asset('assets/js/sweetalert2.js') }}"></script>


    @livewireStyles
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onLoad="">
    <div class="fullsection">
        <div class="sidebar">
            @include('dashboard::layouts.sidebar')
        </div>
        <div class="maincontent">
            @yield('content')
        </div>
    </div>


    {{-- Vite JS --}}
    {{-- {{ module_vite('build-dashboard', 'resources/assets/js/app.js') }} --}}

    @if(session('success'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: "success",
        title: "{{session('success')}}"
        });
    </script>
    @endif
    @if(session('error'))
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
        });
        Toast.fire({
        icon: "error",
        title: "{{session('error')}}"
        });
    </script>
    @endif

    <script language="JavaScript" type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
    
    
    
    @livewireScripts
    



    @yield('script')

    
    
</body>
