<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <header class="text-center">
                <h2 class="text-2xl font-medium uppercase mb-4">
                    Edit Category
                </h2>
            </header>
            <form method="POST" action="{{ route('updateCategory', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="name"
                        class="inline-block text-lg mb-2"
                        >Category Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{ old('name') ? old('name') : ($category->name ? ucfirst($category->name) : '') }}"
                    />
    
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
    
                <div class="mb-6">
                    <label for="title" class="inline-block text-lg mb-2"
                        >Classification</label
                    >
                    <select name="classification_id" id="classification_id" class="border border-gray-200 rounded p-2 w-full">
                        @foreach ($dbClassificationList as $dbClassification)
                        <option value="{{ $dbClassification->id }}" {{ $dbClassification->id == $category->classification->id ? 'selected' : '' }} >{{ ucfirst($dbClassification->name); }}</option>
                        @endforeach
                    </select>
                    @error('classification_id')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6 flex flex-col justify-center">
                    <button
                        class="bg-primary text-white rounded py-2 px-4 hover:bg-secondary"
                    >
                        Save Category
                    </button>
    
                    <a href="/internal/door/categories" class="text-black ml-auto mt-4"> <i class="fa-solid fa-backward"></i> Back </a>
                </div>
            </form>
        </div>
    </x-padding-wrapper>
</x-layout>