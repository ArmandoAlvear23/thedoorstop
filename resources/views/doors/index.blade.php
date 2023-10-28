<x-layout>
    <x-padding-wrapper>
        @include('partials._search-doors')
        <x-door-filter :classifications="$classifications" :activeFilters="$activeFilters" />
        <span class="text-xs text-gray-400 font-light ml-3">{{ count($doors) }} door{{ count($doors) != 1 ? 's' : '' }} found</span>
        <div class="lg:grid xl:grid-cols-2 gap-4 space-y-4 md:space-y-0 my-6">
            @unless(count($doors) == 0)
            @foreach($doors as $door)
                <x-door-card :door="$door" :activeFilters="$activeFilters" />
            @endforeach
            @else
                <p>No doors found</p>
            @endunless
        </div>
    </x-padding-wrapper>
</x-layout>