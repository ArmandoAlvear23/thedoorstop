<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <table class="w-full">
                @foreach ($classifications as $classification)
                    <thead>
                        <tr>
                            <th class="bg-blue-200 border px-6 py-4 flex justify-between">
                                <div class="flex items-center mr-2">
                                    <span class="text-xl font-medium">{{ ucfirst($classification->name); }}</span>
                                    <button onclick="window.location='{{ URL::route('editClassification', ['classification' => $classification]); }}'" class="text-white font-normal rounded bg-blue-500 hover:bg-blue-600 px-2 py-0.5 ml-2 hover:cursor-pointer"><i class="fa-regular fa-pen-to-square fa-sm transition ease-out duration-200"></i> Edit</button>
                                    @unless(count($classification->categories) > 0)
                                    <form method="POST" action="{{ URL::route('destroyClassification', ['classification' => $classification]); }}">
                                        @csrf
                                        @method("DELETE")
                                        <button class="text-white font-normal rounded bg-red-500 hover:bg-red-600 px-2 py-0.5 ml-2 hover:cursor-pointer disabled:bg-red-300 disabled:cursor-auto transition ease-out duration-200" {{ count($classification->categories) > 0 ? 'disabled' : '' }}>
                                            <i
                                                class="fa-solid fa-trash-can fa-sm"
                                            ></i>
                                            Delete
                                        </button>
                                    </form>
                                    @endunless
                                </div>
                                <a href="{{ route('createCategory', ['classification' => $classification]) }}" class="text-white rounded bg-green-500 hover:bg-green-600 transition ease-out duration-200 px-5 py-1.5">Add <i class="fa-solid fa-plus"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classification->categories as $category)
                            <tr>
                                <td class="border px-6 py-4">
                                    <div class="flex flex-row justify-between">
                                        <div class="flex flex-col">
                                            <span>{{ ucfirst($category->name); }}</span>
                                            <a href="/doors?category%5B%5D={{ $category->id }}" class="text-xs text-gray-500 align-bottom" target="_blank">Doors: {{ $category->doors_count }}</a>
                                        </div>
                                        <div class="flex flex-row space-x-3">
                                            <button onclick="window.location='{{ URL::route('editCategory', ['category' => $category]); }}'" class="text-white rounded bg-blue-500 hover:bg-blue-600 px-3 py-1.5 hover:cursor-pointer transition ease-out duration-200"><i class="fa-regular fa-pen-to-square"></i> Edit</button>
                                            
                                            <form method="POST" action="{{ URL::route('destroyCategory', ['category' => $category]); }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="text-white rounded bg-red-500 hover:bg-red-600 px-3 py-2 hover:cursor-pointer disabled:bg-red-300 disabled:cursor-auto transition ease-out duration-200" {{ $category->doors_count > 0 ? 'disabled' : '' }}>
                                                    <i
                                                        class="fa-solid fa-trash-can"
                                                    ></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr><td class=" h-10"></td></tr>
                    </tbody>                
                @endforeach
            </table>
            <div class="flex flex-row justify-center">
                <button onclick="window.location='{{ URL::route('createClassification'); }}'" class="text-white rounded bg-primary hover:bg-primary2 transition ease-out duration-200 px-3 py-1.5 hover:cursor-pointer">Add Classification</button>
            </div>
        </div>
    </x-padding-wrapper>
</x-layout>