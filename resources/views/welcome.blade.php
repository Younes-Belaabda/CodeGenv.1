<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" @if (config('app.locale') == 'ar') dir="rtl" @endif>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('master.title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
        <div class="callout">
            <h5>تسجيل الدخول</h5>
            <hr>
            <form>
                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <div class="medium-12 cell">
                            <label>@lang('auth.email')
                                <input type="text" name="email" placeholder="@lang('auth.email')">
                            </label>
                        </div>
                        <div class="medium-12 cell">
                            <label>@lang('auth.password')
                                <input type="password" name="password" placeholder="@lang('auth.password')">
                            </label>
                        </div>
                    </div>
                    <button class="button">@lang('auth.login')</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
