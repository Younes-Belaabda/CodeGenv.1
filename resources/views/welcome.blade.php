<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if(config('app.locale') == 'ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('master.title')</title>
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>

<body>
    <div class="grid-container" style="margin-top: 25px">
        <div class="callout secondary">
            <h5>@lang('master.title')</h5>
            <p>@lang('master.description')</p>
            <p>
                <span>Team : </span>
                <a href="#">BL97</a>
            </p>
        </div>
        <a class="button" href="{{ route('login') }}">@lang('auth.login')</a>
    </div>
</body>

</html>
