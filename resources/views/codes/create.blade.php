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
                        @error('group')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="medium-6 cell">
                        <label>@lang('master.hashcode_prefix')
                            <input type="text" name="prefix" placeholder="@lang('master.hashcode_prefix')">
                        </label>
                        @error('prefix')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="medium-6 cell">
                        <label>@lang('master.hashcode_suffix')
                            <input type="text" name="suffix" placeholder="@lang('master.hashcode_suffix')">
                        </label>
                        @error('prefix')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
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
                        @error('smallcase')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="medium-4 cell">
                        <label>@lang('master.hashcode_uppercase')
                            <input type="text" name="uppercase" placeholder="@lang('master.hashcode_uppercase')">
                        </label>
                        @error('uppercase')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="medium-4 cell">
                        <label>@lang('master.hashcode_numbers')
                            <input type="text" name="numbers" placeholder="@lang('master.hashcode_numbers')">
                        </label>
                        @error('numbers')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="medium-12 cell">
                        <label>@lang('master.hashcode_codes_numbers')
                            <input type="text" name="codes_number" placeholder="@lang('master.hashcode_codes_numbers')">
                        </label>
                        @error('codes_number')
                            <p class="callout alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button class="button">@lang('master.submit')</button>
            </div>
        </div>
    </form>
</x-app-layout>
