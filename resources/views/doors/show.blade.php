<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <header class="text-center">
                <h2 class="text-2xl font-medium text-gray-700 mb-4">
                    {{ $door->name ? $door->name : '' }}
                </h2>
            </header>
            <div class="mb-2 flex justify-center items-center">
                <img
                    class="rounded-lg w-11/12 lg:10/12 h-full border-2 border-gray-200 shadow-md"
                    src="{{$door->img_location ? asset($door->img_location) : asset('images/no-image.png')}}"
                    alt="door photo"
                />
            </div>
            <div class="mb-6 flex justify-end items-center w-11/12 lg:10/12">
                <span class="text-xs font-light text-gray-400">SKU: {{ $door->sku }}</span>
            </div>
            @unless (!isset($door->description))
                <div class="mb-6 px-4">
                    <p class="text-md font-normal text-gray-600">{{ $door->description }}</p>
                </div>
                <hr />
            @endunless
            <div class="mt-4 flex justify-center items-center">
                <x-door-tags :tagsArr="$door->categories" :activeFilters="array()"></x-door-tags>
            </div>
            @auth
                <div class="flex justify-center items-center">
                    @unless (count($door->promotions) == 0)
                        <x-door-promotion-tags :tagsArr="$door->promotions" :activeFilters="array()" />
                    @endunless
                </div>
                <div class="flex justify-center items-center mt-6">
                    <a href="{{ route('editDoor', ['door' => $door]) }}" class="rounded-md border-2 border-gray-500 text-gray-500 bg-transparent hover:bg-gray-500 hover:text-white transition ease-out duration-200 px-5 py-1.5">Edit Door</a>
                </div>
            @endauth
            <div class="flex flex-col justify-center">
                <a href="{{ URL::previous() }}" class="text-black ml-auto mt-4"> <i class="fa-solid fa-backward"></i> Back </a>
            </div>
        </div>
    </x-padding-wrapper>
</x-layout>