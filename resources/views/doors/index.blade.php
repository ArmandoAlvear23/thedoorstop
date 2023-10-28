<x-layout>
    <x-padding-wrapper>
        @include('partials._search-doors')
        <x-door-filter :classifications="$classifications" :activeFilters="$activeFilters" />
        <div class="lg:grid xl:grid-cols-2 gap-4 space-y-4 md:space-y-0 mt-6">
            @unless(count($doors) == 0)
            @foreach($doors as $door)
                <x-door-card :door="$door" :activeFilters="$activeFilters" />
            @endforeach
            @else
                <p>No doors found</p>
            @endunless
        </div>
        <div class="mt-6 p-4">
            {{$doors->links()}}
        </div>
    </x-padding-wrapper>
</x-layout>