<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>
<div style="width:100%;height:80px;text-align:center;background-color:rgb(62, 59, 102);padding: 10px;">
    <img alt="{{ config('app.name') }}" title="{{ config('app.name') }}" id="imgBklL2brFc7" height="auto" src="{{ asset('site/img/site-logo.png') }}" width="204px" style="margin: 0 auto;border: none; display: block; outline: none; text-decoration: none; height: auto; max-width: 100%; width: 204px;">
</div>
<div style="width:100%;height:auto;background-color:rgb(216, 216, 216);padding: 10px;">
    {!! $body !!}
</div>
<div style="width:100%;height:45px;text-align:center;background-color:rgb(62, 59, 102);padding: 10px;text-align:center;">
    <p style="color:#fff;font-size:16px;">Feel free to ask your questions, <a href="mailto:{{config('mail.support')}}" style="text-decoration: none;color:#fff;">{{config('mail.support')}}</a></p>
</div>
</body>

</html>