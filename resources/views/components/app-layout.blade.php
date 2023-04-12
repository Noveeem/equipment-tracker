<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@isset($title) {{ $title }} - @endisset Awesome OS</title>
    {{-- JS --}}
    <script src="{{ url('assets/js/jquery-3.6.4.min.js') }}"></script>
    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/bfd2eec0b7.js" crossorigin="anonymous"></script>
    {{-- Bootstrap SASS --}}
    @vite(['resources/sass/app.scss', 'resources/css/app.css'])
</head>
<body>

    @auth
        <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-aos fw-bold" href="#">AWESOME OS</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if (Request::url() === url('/new-tracking') || Request::url() === url('dashboard/history'))
                
                @else 
                    <input class="form-control form-control-dark w-100 fw-light" type="search" placeholder="Control # or LT-M-####" aria-label="Search" id="search">
                @endif
        </header>
    @endauth

    {{
        $slot
    }}
    
    
    @include('sweetalert::alert')
</body>
</html> 