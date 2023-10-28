@props(['door', 'activeFilters'])

<div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
    <div class="flex">
        <img
            class="rounded-md w-48 mr-6"
            src="{{$door->img_location ? asset($door->img_location) : asset('images/no-image.png')}}"
            alt="door photo"
        />
        <div>
            <h3 class="text-2xl">
                <a href="/doors/{{$door->id}}">{{$door->name}}</a>
            </h3>
            <div class="text-sm mb-4">{{$door->sku}}</div>
            @unless (count($door->categories) == 0)
                <x-door-tags :tagsArr="$door->categories" :activeFilters="$activeFilters" />
            @endunless
        </div>
    </div>
</div>