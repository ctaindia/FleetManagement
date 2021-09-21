<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}-@yield('title')</title>

    <!--css links-->
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body id="body-pd" class="{{request()->routeIs('login')? 'login-body' : ''}}">
    @if (!request()->routeIs('login'))
        <!-- header -->
        @include('layouts.header')
        <!-- sidebar -->
        @include('layouts.sidebar') 
    @endif
    
    <!--Container Main start-->
    @yield('main-content')

    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(Session::has('Success'))
            swal('Success','{{Session::get('Success')}}', 'success');
        @elseif(Session::has('Errors'))
            swal('Error','{{Session::get('Errors')}}', 'error');
        @endif
    </script>
    @yield('script')
</body>
</html>