@extends('layouts.guest')

@section('content')
    <div class="callout secondary">
        <h5>تسجيل الدخول</h5>
        <hr>
        <form action="{{ route('login') }}" method="POST">
            @csrf
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
@endsection
