<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CodeGenerator v.1</title>
    @vite(['resources/css/app.css' , 'resources/js/app.js'])
</head>

<body>
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
    <main>
        {{ $slot }}
    </main>
</body>

<script src="{{ asset('assets/clipboard.js') }}"></script>
<script defer>
    new ClipboardJS('.copy');
</script>

</html>