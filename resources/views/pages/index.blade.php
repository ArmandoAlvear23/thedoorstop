<x-layout>
    <x-hero :heroImages="$heroImages"></x-hero>
    <x-padding-wrapper>
        <section class="mt-8">
            @include('partials._search-doors')
            <x-door-filter :classifications="$classifications" :activeFilters="$activeFilters" />
            <div class="lg:grid xl:grid-cols-2 gap-4 space-y-4 md:space-y-0 my-6">
                @unless(count($homeDoors) == 0)
                @foreach($homeDoors as $door)
                    <x-door-card :door="$door" :activeFilters="$activeFilters" />
                @endforeach
                @else
                    <p>No doors found</p>
                @endunless
            </div>
        </section>
    </x-padding-wrapper>
</x-layout>