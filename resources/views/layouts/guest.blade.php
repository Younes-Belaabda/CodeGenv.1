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
    @yield('content')
</body>

</html>