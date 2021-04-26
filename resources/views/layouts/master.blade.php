 <!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Welcome to CDD Online Library</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <!-- owlbert -->
    <link rel="owlbert" sizes="100x100" href="assets/img/owlbert.png" />
    <link rel="icon" type="image/png" href="assets/img/owlbert.png" />
   <link href="{{ asset('/css/pack.css') }}" rel="stylesheet" />
</head>
<body>
   
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main-panel">
            @include('layouts.nav')
            <div class="content">
                <div class="container-fluid">                    
                @yield('content')         
                </div>
            </div>
        </div>        
   </div>
<script src="{{ asset('/js/pack.js') }}" type="text/javascript"></script>

</body>
</html>