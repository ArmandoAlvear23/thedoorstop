@props(['door', 'activeFilters'])

<div class="bg-gray-50 border border-gray-200 rounded-lg p-6 shadow-sm">
    <div class="flex flex-col md:flex-row">
            <img
                class="rounded-md w-full md:w-48 h-full mr-6"
                src="{{$door->img_location ? asset($door->img_location) : asset('images/no-image.png')}}"
                alt="door photo"
            />
        <div>
            <h3 class="text-2xl font-normal text-gray-800 mb-1 mt-2 md:mt-0">
                <a href="{{ route('showDoor', $door->id) }}">{{$door->name}}</a>
            </h3>
            <div class="text-xs font-light text-gray-500 mb-4">{{$door->sku}}</div>
            @unless (count($door->categories) == 0)
                <div>
                    <x-door-tags :tagsArr="$door->categories" :activeFilters="$activeFilters" />
                </div>
            @endunless
            @auth
                @unless (count($door->promotions) == 0)
                    <x-door-promotion-tags :tagsArr="$door->promotions" :activeFilters="$activeFilters" />
                @endunless
                <div class="mt-6">
                    <a href="{{ route('editDoor', ['door' => $door]) }}" class="rounded-md border-2 border-gray-500 text-gray-500 bg-transparent hover:bg-gray-500 hover:text-white transition ease-out duration-200 px-5 py-1.5">Edit Door</a>
                </div>
            @endauth
        </div>
    </div>
</div>