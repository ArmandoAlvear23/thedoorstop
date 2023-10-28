<header>
    <div 
        x-data="{ open: false }"
        @resize.window="
            width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
            if (width > 640) {
            open = false
            }"
        >
        <!-- Header -->
        <div class="py-px px-6 flex justify-between items-center bg-primary sm:bg-gray-100 lg:px-56">
            <div>
                <a href="/">
                    <img src="{{ asset("images/the-door-stop-logo.png") }}" alt="The Door Stop" class="w-28">
                </a>
            </div>
            <div>
                <button class="py-2 px-4 rounded-md sm:hidden border-2" @click="open = ! open">
                    <i class="fa-solid fa-xl text-white" :class="open ? 'fa-x' : 'fa-bars'"></i>
                </button>
                <div  class="text-right hidden sm:block">
                    <a href="tel:956-574-9071" class="font-bold text-gray-700"><span><i class="fa-solid fa-phone fa-shake"></i> (956) 574-9071</span></a>
                    <ul class="text-xs text-gray-700">
                        <li>Mon-Fri: 8:30a-5:30p</li>
                        <li>Saturday: 10a-2p</li>
                        <li>Sunday: Closed</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Desktop Navbar -->
        <nav class="bg-primary py-4 px-6 hidden sm:block shadow-md">
            <ul class="flex sm:space-x-7 lg:justify-center">
                <li class="{{ str_contains(Request::getRequestUri(), '?search=modern') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/doors?search=modern" class="text-white uppercase">Modern</a></li>
                <li class="{{ str_contains(Request::getRequestUri(), '?search=traditional') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/doors?search=traditional" class="text-white uppercase">Traditional</a></li>
                <li class="{{ str_contains(Request::getRequestUri(), '?search=rustic') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/doors?search=rustic" class="text-white uppercase">Rustic</a></li>
                <li class="{{ str_contains(Request::getRequestUri(), '?search=craftsman') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="doors?search=craftsman" class="text-white uppercase">Craftsman</a></li>
                <li class="{{ Request::is('about') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/about" class="text-white uppercase">About</a></li>
                <li class="{{ Request::is('contact') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/contact" class="text-white uppercase">Contact</a></li>
            </ul>
        </nav>
        @include('components.admin-nav')
        
        <!-- Mobile Nav dropdown -->
        <nav class="" 
            x-cloak
            x-show="open"
            x-transition
            {{-- x-transition.enter.duration.500ms
            x-transition.leave.duration.400ms  --}}
        >
            <div class="bg-primary w-full h-screen">
                <ul class="flex justify-center flex-col items-start px-8 text-4xl">
                    <a href="/doors?search=modern" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?search=modern') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Modern</li>
                    </a>
                    <a href="/doors?search=traditional" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?search=traditional') ? 'text-secondary border-secondary' : 'text-white first-letter:border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Traditional</li>
                    </a>
                    <a href="/doors?search=rustic" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?search=rustic') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Rustic</li>
                    </a>
                    <a href="/doors?search=craftsman" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?search=craftsman') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Craftsman</li>
                    </a>
                    <a href="/about" class="my-2 w-full bg-primary {{ Request::is('about') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">About</li>
                    </a>
                    <a href="/contact" class="my-2 w-full bg-primary {{ Request::is('contact') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Contact Us</li>
                    </a>
                </ul>
            </div>
        </nav>
    </div>
</header>