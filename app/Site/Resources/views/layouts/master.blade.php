<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <title>{{ isset($title) ? ($title . ' | ' . config('app.name')) : config('app.name') }}</title>
    <link href="{{ asset('site/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{ asset('vendor/prism/prism.css') }}">
    <!-- Custom styles for this template -->
    <link href="/site/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
@include('site::layouts.navbar-top')

@yield('content')

@include('site::layouts.footer')


<!-- Bootstrap core JavaScript -->
<script src="/site/js/jquery.min.js"></script>
<script src="/site/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('vendor/prism/prism.js') }}"></script>

<!-- Custom scripts for this template -->
<script src="/site/js/clean-blog.min.js"></script>
</body>

</html>
