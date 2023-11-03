@props(['testimonial'])

<div class="bg-gray-50 border border-gray-200 rounded-lg p-6 px-10 shadow-sm">
    <div class="flex flex-col gap-3">
        <p class="font-light text-gray-800"><i class="fa-solid fa-quote-left"></i> {{ $testimonial->testimonial }} <i class="fa-solid fa-quote-right"></i></p>
        <p class="ml-auto font-light text-gray-900" style="font-style: italic;">&#8212; {{ $testimonial->name }}</p>
        @auth
            <div class="mt-6">
                <a href="{{ route('editTestimonial', ['testimonial' => $testimonial]) }}" class="rounded-md border-2 border-gray-500 text-gray-500 bg-transparent hover:bg-gray-500 hover:text-white transition ease-out duration-200 px-5 py-1.5">Edit Testimonial</a>
            </div>
        @endauth
    </div>
</div>