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
    <div class="off-canvas-wrapper">
        <div class="off-canvas position-right padding-1" id="offCanvas" data-off-canvas>
            <aside>
                <ul class="vertical menu">
                    <li>
                        <a href="{{ route('codes.create') }}">@lang('navigation.generate_codes')</a>
                    </li>
                    <li>
                        <a href="{{ route('codes.groupes') }}">@lang('navigation.code_database')</a>
                    </li>
                </ul>
            </aside>
        </div>
        <div class="off-canvas-content padding-2" data-off-canvas-content>
            <button type="button" class="button" data-toggle="offCanvas">@lang('master.open-menu')</button>
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

<script src="{{ asset('assets/js/JQuery.js') }}"></script>
<script src="{{ asset('assets/js/fondation.js') }}"></script>
<script src="{{ asset('assets/js/clipboard.js') }}"></script>
<script>
    $(document).foundation();
</script>
<script>
    new ClipboardJS('.copy');
</script>

</html>
