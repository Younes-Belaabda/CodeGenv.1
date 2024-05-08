<x-app-layout>
    <form action="{{ route('codes.store') }}" method="POST">
        @csrf
        <div class="callout secondary">
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="medium-12 cell">
                        <label>@lang('master.hashcode_group')
                            <input type="text" name="group" placeholder="@lang('master.hashcode_group')">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>@lang('master.hashcode_prefix')
                            <input type="text" name="prefix" placeholder="@lang('master.hashcode_prefix')">
                        </label>
                    </div>
                    <div class="medium-6 cell">
                        <label>@lang('master.hashcode_suffix')
                            <input type="text" name="suffix" placeholder="@lang('master.hashcode_suffix')">
                        </label>
                    </div>
                    {{-- <div class="medium-12 cell">
                        <label>@lang('master.hashcode_length') *
                            <input type="text" name="length" placeholder="@lang('master.hashcode_length')">
                        </label>
                    </div> --}}
                    <div class="medium-4 cell">
                        <label>@lang('master.hashcode_smallcase')
                            <input type="text" name="smallcase" placeholder="@lang('master.hashcode_smallcase')">
                        </label>
                    </div>
                    <div class="medium-4 cell">
                        <label>@lang('master.hashcode_uppercase')
                            <input type="text" name="uppercase" placeholder="@lang('master.hashcode_uppercase')">
                        </label>
                    </div>
                    <div class="medium-4 cell">
                        <label>@lang('master.hashcode_numbers')
                            <input type="text" name="numbers" placeholder="@lang('master.hashcode_numbers')">
                        </label>
                    </div>
                </div>
                <button class="button">@lang('master.submit')</button>
            </div>
        </div>
    </form>
</x-app-layout>
