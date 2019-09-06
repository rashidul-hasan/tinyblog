<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>

<body>

<div style="width:100%;height:80px;text-align:center;background-color:rgb(62, 59, 102);padding: 10px;">
    <img alt="{{ config('app.name') }}" title="{{ config('app.name') }}" id="imgBklL2brFc7" height="auto" src="{{ asset('site/img/site-logo.png') }}" width="204px" style="margin: 0 auto;border: none; display: block; outline: none; text-decoration: none; height: auto; max-width: 100%; width: 204px;">
</div>
<div style="width:100%;height:auto;background-color:rgb(216, 216, 216);padding: 10px;">
    <p style="color:#000;font-size:16px;">New reply to article</p>
    <br/>
    <p>Article link: <a href="{{ $article_link }}">{{ $article_link }}</a></p>
    <p>Replied by: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>message: {{ $message }}</p>
    <br/>
    <br/>
    <p style="color:#000;font-size:16px;">Please let us know if you have any questions or need any help :)</p>
    <p style="color:#000;font-size:16px;">Regards</p>
    <p style="color:#000;font-size:16px;">{{ config('app.name') }} Team</p>
</div>
<div style="width:100%;height:45px;text-align:center;background-color:rgb(62, 59, 102);padding: 10px;text-align:center;">
    <p style="color:#fff;font-size:16px;">Feel free to ask your questions, <a href="mailto:{{config('mail.support')}}" style="text-decoration: none;color:#fff;">{{config('mail.support')}}</a></p>
</div>

</body>

</html>