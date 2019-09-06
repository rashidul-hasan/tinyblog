<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="/favicon.png" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.png" />
    <title>{{ config('app.name') }} | Login </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="/admin/css/dashboard.css" rel="stylesheet" />
</head>
<body class="">
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="" class="h-6" alt="TinyCMS">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-info">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form class="card" action="{{ route('login') }}" method="POST">
                        {{csrf_field()}}
                        <div class="card-body p-6">
                            <div class="card-title">Login to your account</div>
                            <div class="form-group">
                                <label class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" placeholder="Enter email"
                                       name="email"
                                       value="{{ app()->environment('local') ? env('ADMIN_EMAIL') : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">
                                    Password
                                    <a href="{{ route('password.request') }}" class="float-right small">I forgot password</a>
                                </label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                                       name="password"
                                       value="{{ app()->environment('local') ? env('ADMIN_PASS') : '' }}" required>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                    <span class="custom-control-label">Remember me</span>
                                </label>
                            </div>
                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>
                        </div>
                    </form>
                    {{--<div class="text-center text-muted">
                        Don't have account yet? <a href="./register.html">Sign up</a>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
