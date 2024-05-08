
<x-app-layout>
    <div class="callout secondary">
        <form action="{{ route('codes.groupes') }}" method="get">
            <input type="text" name="q" placeholder="@lang('master.search') ...">
            <button class="button">@lang('master.search')</button>
        </form>
    </div>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            @foreach ($groupes as $group)
                <div class="medium-4 cell">
                    <div class="callout primary">
                        <p>{{ $group->name }}</p>
                        <div class="grid-x">
                            <div class="cell large-auto">
                                <form action="{{ route('codes.download' , ['group' => $group]) }}" method="post">
                                    @csrf
                                    <button class="button success">@lang('master.download')</button>
                                </form>
                            </div>
                            <div class="cell large-auto">
                                <a class="button primary" href="{{ route('codes.index' , ['group' => $group]) }}">@lang('master.show')</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $groupes->links() }}
    </div>
</x-app-layout>
