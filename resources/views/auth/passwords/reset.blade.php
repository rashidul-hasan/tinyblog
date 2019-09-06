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
    <title>{{ config('app.name') }} | Reset Password </title>
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
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            {{$errors->first()}}
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        <div class="row">
                            <a href="{{ url('/') }}" class="btn btn-primary btn-block btn-flat">Go to Homepage</a>
                        </div>
                    @else
                        <form class="card" method="POST" action="{{ route('password.request') }}">
                            {{csrf_field()}}
                            <div class="card-body p-6">
                                <div class="card-title tc">Create a new Password</div>
                                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label class="form-label">Email address</label>
                                    <input type="email" class="form-control"
                                           aria-describedby="emailHelp" placeholder="Enter email"
                                           name="email"
                                           value="{{ $email ?? old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="form-label">
                                        New Password
                                    </label>
                                    <input type="password" class="form-control" placeholder="Password"
                                           name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label class="form-label">
                                        Confirm New Password
                                    </label>
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                           name="password_confirmation" required>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                                </div>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
