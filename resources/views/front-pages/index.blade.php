<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link id="bs-css" href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/vendors/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/vendors/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
    <title>@yield('title',  config('app.name') )</title>
</head>
<body>
<div class="row">
    @yield('content')
</div>

<script src='/vendors/jquery/dist/jquery.js' type='text/javascript'></script>
<script type="text/javascript" src="/vendors/moment/min/moment.min.js"></script>
<script type="text/javascript" src="/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/vendors/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="js/main.js"></script>
@yield('scripts')
</body>
</html>
