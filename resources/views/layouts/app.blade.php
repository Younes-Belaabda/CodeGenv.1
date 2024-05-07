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
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="medium-2 cell">
                <aside>
                    <ul>
                        <li>
                            <a href="{{ route('codes.create') }}">Generate Codes</a>
                        </li>
                        <li>
                            <a href="{{ route('codes.index') }}">Codes Database</a>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="medium-10 cell">
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</body>

<script src="{{ asset('assets/clipboard.js') }}"></script>
<script defer>
    new ClipboardJS('.copy');
</script>

</html>
