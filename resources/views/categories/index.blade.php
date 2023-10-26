<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <table class="w-full">
                @foreach ($classifications as $classification)
                    <thead>
                        <tr>
                            <th class="bg-blue-200 border px-6 py-4 flex justify-between">
                                <span class="text-xl font-medium">{{ ucfirst($classification->name); }}</span>
                                <a href="{{ route('createCategory', ['classification' => $classification]) }}" class="text-white rounded bg-green-500 hover:bg-green-600 px-5 py-1.5">Add</a>
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
                                            <span class="text-xs text-gray-500 align-bottom">doors: {{ $category->doors_count }}</span>
                                        </div>
                                        <div class="flex flex-row space-x-3">
                                            <button onclick="window.location='{{ URL::route('editCategory', ['category' => $category]); }}'" class="text-white rounded bg-blue-500 hover:bg-blue-600 px-3 py-1.5 hover:cursor-pointer">Edit</button>
                                            
                                            <form method="POST" action="{{ URL::route('destroyCategory', ['category' => $category]); }}">
                                                @csrf
                                                @method("DELETE")
                                                <button class="text-white rounded bg-red-500 hover:bg-red-600 px-3 py-2 hover:cursor-pointer disabled:bg-red-300 disabled:cursor-auto" {{ $category->doors_count > 0 ? 'disabled' : '' }}>
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
                <button onclick="window.location='{{ URL::route('createClassification'); }}'" class="text-white rounded bg-primary hover:bg-secondary px-3 py-1.5 hover:cursor-pointer">Add Classification</button>
            </div>
        </div>
    </x-padding-wrapper>
</x-layout>