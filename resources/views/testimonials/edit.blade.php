<x-layout>
    <x-padding-wrapper>
        <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 my-8 mx-0 md:mx-8 lg:mx-20 shadow-xl overflow-auto">
            <header class="text-center">
                <h2 class="text-2xl font-medium uppercase text-gray-700 mb-4">
                    Edit Testimonial
                </h2>
            </header>
            <form method="POST" action="{{ route('updateTestimonial', $testimonial->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="name"
                        class="inline-block text-lg text-gray-700 mb-2"
                        >Person Name</label
                    >
                    <input
                        type="text"
                        class="border border-gray-200 rounded p-2 w-full"
                        name="name"
                        value="{{ old('name') ? old('name') : ($testimonial->name ? $testimonial->name : '') }}"
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
                      rows="8"
                  >{{ old('testimonial') ? old('testimonial') : ($testimonial->testimonial ? $testimonial->testimonial : '') }}</textarea>
                  @error('testimonial')
                      <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                  @enderror
              </div>
              <div class="mb-6 flex flex-col justify-center">
                <button
                    class="bg-primary text-white rounded py-2 px-4 hover:bg-primary2 transition ease-out duration-200"
                >
                    Update Testimonial
                </button>
            </form>
            <a href="{{ URL::previous() }}" class="text-white text-center mt-6 py-2 w-full bg-primary rounded  hover:bg-primary2 transition ease-out duration-200"> <i class="fa-solid fa-backward"></i> Back </a>
            <form method="POST" action="{{ route('destroyTestimonial', $testimonial) }}">
                @csrf
                @method("DELETE")
                <button 
                    class="text-white font-normal rounded bg-red-500 hover:bg-red-600 px-4 py-2 hover:cursor-pointer transition ease-out duration-200 mt-6 w-full"
                    onclick="return confirm('Are you sure you want to delete this testimonial?')"
                >
                <i
                    class="fa-solid fa-trash-can fa-sm"
                ></i>
                Delete Testimonial
                </button>
            </form>
        </div>
    </x-padding-wrapper>
</x-layout>

