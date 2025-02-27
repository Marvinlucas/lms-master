<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GURU</title>

    <!-- Custom fonts for this template-->
    <link href="{{URL::to('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    {{-- <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet"> --}}

    <!-- Custom styles for this template-->
    @if(Auth::check() && Auth::user()->theme == 'dark')  
        <link href="{{ URL::to('css/dark/sb-admin-2.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::to('css/sb-admin-2.css') }}" rel="stylesheet">
    @endif
    <link href="{{ URL::to('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::to('vendor/jQuery-TE/jquery-te-1.4.0.css') }}" rel="stylesheet">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Google Analytics opt-out snippet added by Site Kit -->
    <script type="text/javascript">
    window["ga-disable-UA-118287266-1"] = true;
    </script>
    <script type="text/javascript">
    window["ga-disable-G-JE49KMQSTV"] = true;
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="path-to-fontawesome/css/all.min.css">
    <link rel="icon" href="{{ asset('img/logo/favicon-guru.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('img/logo/favicon-guru.png') }}" type="image/x-icon">
    <script src="https://kit.fontawesome.com/ef7dab569f.js" crossorigin="anonymous"></script>
</head>
