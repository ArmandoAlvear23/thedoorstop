<x-layout>
    <x-padding-wrapper>
        <div class="pt-10">
            <div class="flex flex-row">
                    <h2 class="text-2xl text-gray-700 font-light"><i class="fa-solid fa-star py-3"></i>Testimonials</h2>
                    @auth
                        <a href="{{ route('createTestimonial') }}" class="text-white rounded bg-green-500 hover:bg-green-600 transition ease-out duration-200 px-4 py-2 mb-2 ml-auto">Add Testimonial</a>
                    @endauth
            </div>
            <hr />
            <div class="flex flex-col gap-4 font-light text-gray-700 py-8">
                <p>
                    We put in a lot of effort to uphold our long-standing position as a top player in the door industry and to ensure you have an excellent shopping experience.
                </p>
                <p>
                    We greatly appreciate your feedback when we excel in our services, so please consider sharing a <a href="{{ route('contact') }}" class="text-primary">testimonial</a> about your experience with us, which may be featured on our website.
                </p>       
            </div>
            <div class="lg:grid xl:grid-cols-2 gap-4 space-y-4 md:space-y-0 my-6">
                @unless(count($testimonials) == 0)
                    @foreach($testimonials as $testimonial)
                        <x-testimonial-card :testimonial="$testimonial" />
                    @endforeach
                @endunless
            </div>
        </div>
    </x-padding-wrapper>
</x-layout>