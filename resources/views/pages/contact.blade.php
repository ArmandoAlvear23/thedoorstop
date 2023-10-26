<x-layout>
    <x-padding-wrapper>
        <h1 class="text-center text-4xl text-primary mt-10">Contact Us</h1>
        <h3 class="text-center text-xl text-gray-600 mt-4">We welcome any questions, comments, or feedback you have. Feel free to reach out and we'll be sure to get back to you as soon as possible.</h3>
        <div class="grid lg:grid-cols-2 gap-4 mb-20">
            <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-14 mt-8 shadow-xl self-start">
                <!-- Phone -->
                <div class="flex items-center">
                    <div class="relative mr-4">
                        <div class="block h-10 w-10 bg-sky-200 rounded-full" ></div>
                        <span class="absolute top-[.5rem] left-[.62rem]"><i class="fa-solid fa-phone text-primary fa-lg"></i></span>
                    </div>
                    <div>
                        <h4 class="text-primary font-bold text-xl">Phone</h4>
                        <a href="tel:956-574-9071">
                            <p class="text-gray-600 font-normal">(956) 574-9071</p>
                        </a>
                    </div>
                </div>
                <!-- Email -->
                <div class="flex items-center mt-4">
                    <div class="relative mr-4">
                        <div class="block h-10 w-10 bg-sky-200 rounded-full" ></div>
                        <span class="absolute top-[.5rem] left-[.62rem]"><i class="fa-solid fa-envelope text-primary fa-lg"></i></span>
                    </div>
                    <div>
                        <h4 class="text-primary font-bold text-xl">Email</h4>
                        <a href="mailto:joedoors11@gmail.com">
                            <p class="text-gray-600 font-normal">joedoors11@gmail.com</p>
                        </a>
                    </div>
                </div>
                <!-- Location -->
                <div class="flex items-center mt-4">
                    <div class="relative mr-4">
                        <div class="block h-10 w-10 bg-sky-200 rounded-full" ></div>
                        <span class="absolute top-2 left-3"><i class="fa-solid fa-location-dot text-primary fa-lg"></i></span>
                    </div>
                    <div>
                        <h4 class="text-primary font-bold text-xl">Location</h4>
                        <a href="https://maps.app.goo.gl/LEgU5RxbRKEfK5jh8" target="_blank">
                            <p class="text-gray-600 font-normal">3414 Burton Dr. Brownsville, TX 78521</p>
                        </a>
                    </div>
                </div>
                <!-- Google Maps -->
                <div class="mt-6 shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14354.670733070781!2d-97.4834979840473!3d25.91329283644632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866f95b8f409de95%3A0xe3f03e76ee176665!2sThe%20Door%20Stop!5e0!3m2!1sen!2sus!4v1696625006112!5m2!1sen!2sus" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-lg"></iframe>
                </div>
            </div>
            <div class="bg-gray-50 border border-gray-200 border-y-sky-300 border-y-4 rounded p-10 pb-12 mt-8 shadow-xl">
                <form method="POST" action="{{ route('storeMessage') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="col-span-2 sm:col-span-1 lg:col-span-2">
                            <label 
                                for="name" 
                                class="text-xl text-primary font-bold"
                                >Name</label
                            >
                            <input 
                                type="text" 
                                class="border border-gray-200 rounded mt-2 p-2 w-full h-8" 
                                name="name" 
                                placeholder="Enter your name"
                                value="{{ old('name') }}"
                            />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1 lg:col-span-2">
                            <label 
                                for="name" 
                                class="text-xl text-primary font-bold">
                                Email</label
                            >
                            <input 
                                type="text" 
                                class="border border-gray-200 rounded mt-2 p-2 w-full h-8" 
                                name="email" 
                                placeholder="Enter your email"
                                value="{{ old('email') }}"
                            />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2">
                            <label 
                                for="name" 
                                class="text-xl text-primary font-bold"
                                >Message</label
                            >
                            <textarea 
                                class="border border-gray-200 rounded mt-2 p-2 w-full" 
                                name="message" 
                                placeholder="Questions, comments, or feedback" 
                                rows="3"
                                >{{ old('message') }}</textarea
                            >
                            @error('message')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-center pt-6">
                        <button class="bg-primary text-white rounded-lg py-2 w-1/2 text-lg hover:bg-gray-50 hover:text-primary hover:ring-2 hover:ring-primary shadow-lg transition ease-out duration-500">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </x-padding-wrapper>
</x-layout>