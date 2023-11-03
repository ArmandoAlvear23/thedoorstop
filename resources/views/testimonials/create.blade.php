<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 shadow-xl overflow-auto">
            <header class="text-center">
                <h2 class="text-2xl font-medium text-gray-700 uppercase mb-4">
                    Add Testimonial
                </h2>
            </header>
            <form method="POST" action="{{ route('storeTestimonial') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label
                        for="name"
                        class="inline-block text-lg text-gray-800 mb-2"
                        >Person Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{ old('name') }}"
                        autofocus
                    />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label
                        for="testimonial"
                        class="inline-block text-lg text-gray-700 mb-2"
                        >Testimonial</label
                    >
                    <textarea
                        class="border border-gray-200 rounded p-2 w-full"
                        name="testimonial"
                        rows="6"
                    >{{ old('testimonial') ? old('testimonial') : '' }}</textarea>
                    @error('testimonial')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6 flex flex-col justify-center">
                    <button
                        class="bg-primary text-white rounded py-2 px-4 hover:bg-primary2 transition ease-out duration-200"
                    >
                        Create Testimonial
                    </button>
                    <a href="{{ URL::previous() }}" class="text-black ml-auto mt-4"> <i class="fa-solid fa-backward"></i> Back </a>
                </div>
            </form>
        </div>
    </x-padding-wrapper>
</x-layout>