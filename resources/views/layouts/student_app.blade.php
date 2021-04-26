<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Welcome to CDD Online Library' }}</title>

    <!-- Scripts -->
   <script src="{{ asset('/js/student_app.js') }}" defer></script>
   <script src="{{ asset('/js/student_main.js') }}" defer></script>

   <!-- favicon -->
   <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
   <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@100;300;400&display=swap" rel="stylesheet">
    <!-- Styles -->
    {{-- <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="css/student_app.css"> --}}
    <link href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/student_app.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/student_main.css') }}" rel="stylesheet" />
</head>
<body>
   
    
   
        <div class="wrapper">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('Library Management system') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
    
                        </ul>
    
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <form class="form-inline" type="get" action="{{url('/search')}}">
                                <input class="form-control form-control-sm mr-sm-2 mt-1" type="search" placeholder="Search" aria-label="Search" name="search">
                                <button class="btn btn-blue btn-sm mr-4 mt-1" type="submit">Search</button>
                              </form>
                            <!-- Authentication Links -->
                            <li class="dropdown mt-1 mr-2">
                                <button type="button" class="btn btn-notif btn-sm"  data-toggle="dropdown" >
                                    <i class=" fa fa-bell "></i>
                                    <span class="badge badge-danger">{{auth()->user()->unreadNotifications->count()}}</span>
                                    
                                </button>
                                @if(auth()->user()->unreadNotifications->count() >= 1)
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('markAsRead')}}">Mark all as read</a></li>
                                    <hr>
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <li class="notif">{{ $notification->data['string1'] }} <strong>"{{ $notification->data['book_name'] }}"</strong> {{ $notification->data['string2'] }}</li>
                                    <hr>
                                    @endforeach
                                </ul>
                                @else
                                <ul class="dropdown-menu">
                                    <li>No new notifications</li>
                                </ul>
                                @endif
                            </li>

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>                 
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{url('/ViewBooks')}}">
                                            {{ __('View Books') }}
                                        </a>
                                        <a class="dropdown-item"href="{{url('/reserve')}}">
                                            {{ __('Reserved Books') }}
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>

                        </ul>
                    </div>
                </div>
                
            </nav>
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">                    
                    @yield('content')         
                    </div>
                </div>
            </div>        
       </div>
    {{-- <script src="{{ asset('/js/pack.js') }}" type="text/javascript"></script> --}}

</body>
</html>