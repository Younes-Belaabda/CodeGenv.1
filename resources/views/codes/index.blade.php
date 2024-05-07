<x-app-layout>
    <form action="{{ route('codes.index') }}" method="get">
        <input type="text" name="q" placeholder="@lang('master.search') ...">
        <button class="button">@lang('master.search')</button>
    </form>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            @foreach ($codes as $code)
                <div class="medium-4 cell">
                    <div class="grid-x align-center-middle">
                        <button class="button copy small" data-clipboard-target="#{{ $code->hash }}">@lang('master.copy')</button>
                        <input id="{{ $code->hash }}" type="text" readonly value="{{ $code->hash }}">
                    </div>
                </div>
            @endforeach
        </div>
        {{ $codes->links() }}
    </div>
</x-app-layout>
