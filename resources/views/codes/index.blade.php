<x-app-layout>
    <form action="{{ route('codes.index') }}" method="get">
        <input type="text" name="q" placeholder="search ...">
        <button class="button">Search</button>
    </form>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            @foreach ($codes as $code)
                <div class="medium-4 cell">
                    <div class="grid-x align-center-middle">
                        <button class="button copy small" data-clipboard-target="#{{ $code->hash }}">copy</button>
                        <input id="{{ $code->hash }}" type="text" readonly value="{{ $code->hash }}">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
