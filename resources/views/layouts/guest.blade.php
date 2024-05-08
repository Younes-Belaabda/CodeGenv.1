<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if (config('app.locale') == 'ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('master.title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/fondation-grid.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fondation-prototype.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fondation.css') }}">
</head>

<body>
    <div class="padding-3">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/JQuery.js') }}"></script>
    <script src="{{ asset('assets/js/fondation.js') }}"></script>
    <script src="{{ asset('assets/js/clipboard.js') }}"></script>
    <script>
        $(document).foundation();
    </script>
</body>



</html>
