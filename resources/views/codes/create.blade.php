<x-app-layout>
    <form action="{{ route('codes.store') }}" method="POST">
        @csrf
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="medium-12 cell">
                    <label>@lang('master.hashcode_prefix')
                        <input type="text" name="prefix" placeholder="@lang('master.hashcode_prefix')">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>@lang('master.hashcode_suffix')
                        <input type="text" name="suffix" placeholder="@lang('master.hashcode_suffix')">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>@lang('master.hashcode_length') *
                        <input type="text" name="length" placeholder="@lang('master.hashcode_length')">
                    </label>
                </div>
                {{-- <div class="medium-12 cell">
                    <label>@lang('master.hashcode_range')
                        <input type="text" name="range" placeholder="@lang('master.hashcode_range')">
                    </label>
                </div> --}}
            </div>
            <button class="button">@lang('master.submit')</button>
        </div>
    </form>
</x-app-layout>
