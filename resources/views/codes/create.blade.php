<x-app-layout>
    <form action="{{ route('codes.store') }}" method="POST">
        @csrf
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="medium-12 cell">
                    <label>Prefix
                        <input type="text" name="prefix" placeholder="prefix code">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>Suffix
                        <input type="text" name="suffix" placeholder="suffix code">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>Length *
                        <input type="text" name="length" placeholder="length code">
                    </label>
                </div>
                <div class="medium-12 cell">
                    <label>Range
                        <input type="text" name="range" placeholder="range">
                    </label>
                </div>
            </div>
            <button class="button">Submit</button>
        </div>
    </form>
</x-app-layout>
