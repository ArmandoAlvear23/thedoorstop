<footer class="mt-32">
    <div class="w-full h-12 bg-gray-600"></div>
    <section class="bg-gray-100 px-6 md:px-20 lg:px-56 py-8">
            <img src="{{ asset("images/the-door-stop-logo.png") }}" alt="The Door Stop" class="w-28">
        <div class="grid grid-cols-2 md:grid-cols-3 gap-y-3">
            <div class="col-span-2 md:col-span-1">
                
                <div class="text-gray-500 font-normal text-sm">
                    <p>The Door Stop</p>
                    <p>3414 Burton Dr.</p>
                    <p>Brownsville, TX 78521</p>
                </div>
                <div class="text-gray-500 font-normal mt-4 text-sm"> 
                    <p>Phone: <a href="tel:956-574-9071">956-574-9071</a></p>
                    <p>Email: <a href="mailto:joedoors11@gmail.com">joedoors11@gmail.com</a></p>
                    <a href="{{ route('home') }}" class="text-primary2">www.thedoorstoprgv.com</a>
                </div>
            </div>
            <div>
                <h3 class="font-medium mb-3">Company Info</h3>
                <div class="text-gray-500 font-normal flex flex-col gap-1 text-sm">
                    <a href="{{ route('about') }}" >About Us</a>
                    <a href="{{ route('contact') }}">Contact Us</a>
                    <a href="{{ route('indexTestimonial') }}">Testimonials</a>
                </div>
            </div>
            <div class="">
                <h3 class="font-medium mb-3">Hours of Operation</h3>
                <div class="flex flex-col gap-1 text-sm">
                    <p><span class="font-medium">Monday-Friday:</span><span class="text-gray-500"> 8:30 a.m. - 5:30 p.m. CST</span></p>
                    <p><span class="font-medium">Saturday:</span><span class="text-gray-500"> 10:00 a.m. - 2:00 p.m. CST</span></p>
                    <p><span class="font-medium">Sunday:</span> <span class="text-gray-500"> Closed</span></p>
                </div>
                
            </div>
        </div>
        <div class="text-center mt-12 font-light text-xs text-gray-400">
            Copyright ©{{ date('Y') }}, The Door Stop - All rights reserved.
        </div>
    </section>
    <div class="w-full h-12 bg-gray-600"></div>
</footer>
@stack('scripts')