<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <table class="w-full">
                @foreach ($classifications as $classification)
                    <thead>
                        <tr>
                            <th class="bg-blue-200 border px-6 py-4 flex justify-between">
                                <span class="text-xl font-medium">{{ ucfirst($classification->name); }}</span>
                                <a href="{{ route('create_category', ['classification' => $classification]) }}" class="text-white rounded bg-green-500 hover:bg-green-600 px-5 py-1.5">Add</a>
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
                                        <div class="">
                                            <button class="text-white rounded bg-blue-500 hover:bg-blue-600 px-5 py-1.5">Edit</button>
                                            <button class="text-white rounded bg-red-500 hover:bg-red-600 px-5 py-1.5">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        <tr><td class=" h-10"></td></tr>
                    </tbody>                
                @endforeach
            </table>
        </div>
    </x-padding-wrapper>
</x-layout>