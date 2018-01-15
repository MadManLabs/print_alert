<!-- Stored in resources/views/layouts/master.blade.php -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="csrfToken" content="{{ csrf_token() }}">
    <meta name="absoluteUrl" content="{{ config('app.url') }}">
    <title>PrintAlert - @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" type="text/css" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="css/modal.css">
    <link rel="shortcut icon" href="/img/logo.png"/>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/app.js"></script>
<script src="js/modal.js"></script>
</html>