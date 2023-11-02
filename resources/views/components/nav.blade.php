@props(['categories'])
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
        @php
            $modernId = 3;
            $traditionalId = 4;
            $rusticId = 5;
            $craftsmanId = 6;
        @endphp
        <!-- Desktop Navbar -->
        <nav class="bg-primary py-4 px-6 hidden sm:block shadow-md">
            <ul class="flex sm:space-x-7 lg:justify-center">
                <li class="{{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$modernId) ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/doors?category%5B%5D={{$modernId}}" class="text-white uppercase">Modern</a></li>
                <li class="{{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$traditionalId) ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/doors?category%5B%5D={{ $traditionalId }}" class="text-white uppercase">Traditional</a></li>
                <li class="{{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$rusticId) ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/doors?category%5B%5D={{ $rusticId }}" class="text-white uppercase">Rustic</a></li>
                <li class="{{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$craftsmanId) ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="doors?category%5B%5D={{ $craftsmanId }}" class="text-white uppercase">Craftsman</a></li>
                <li class="{{ Request::is('about') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/about" class="text-white uppercase">About</a></li>
                <li class="{{ Request::is('contact') ? 'border-secondary' : 'border-transparent' }} border-b-2 hover:border-secondary transition ease-out duration-500"><a href="/contact" class="text-white uppercase">Contact</a></li>
            </ul>
        </nav>
        @auth
            <nav class="bg-gray-600 py-1 px-6 hidden sm:block shadow-md">
                <ul class="flex sm:space-x-7 lg:justify-center">
                    @include('partials._admin-links')
                </ul>
            </nav>
        @endauth
        
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
                    <a href="/doors?category%5B%5D={{ $modernId }}" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$modernId) ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Modern</li>
                    </a>
                    <a href="/doors?category%5B%5D={{ $traditionalId }}" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$traditionalId) ? 'text-secondary border-secondary' : 'text-white first-letter:border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Traditional</li>
                    </a>
                    <a href="/doors?category%5B%5D={{ $rusticId }}" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$rusticId) ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Rustic</li>
                    </a>
                    <a href="/doors?category%5B%5D={{ $craftsmanId }}" class="my-2 w-full bg-primary {{ str_contains(Request::getRequestUri(), '?category%5B%5D='.$craftsmanId) ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Craftsman</li>
                    </a>
                    <a href="/about" class="my-2 w-full bg-primary {{ Request::is('about') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">About</li>
                    </a>
                    <a href="/contact" class="my-2 w-full bg-primary {{ Request::is('contact') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <li class="pb-2">Contact Us</li>
                    </a>
                    @auth
                        <a href="/doors" class="my-2 w-full bg-primary {{ Request::is('doors') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                            <li class="pb-2">Doors (Admin)</li>
                        </a>

                        <a href="/internal/doors/create" class="my-2 w-full bg-primary {{ Request::is('internal/doors/create') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                            <li class="pb-2">Upload Door (Admin)</li>
                        </a>

                        <a href="internal/door/categories" class="my-2 w-full bg-primary {{ Request::is('internal/door/categories') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                            <li class="pb-2">Categories (Admin)</li>
                        </a>
                        <a href="internal/messages" class="my-2 w-full bg-primary {{ Request::is('internal/messages') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                            <li class="pb-2">Messages (Admin)</li>
                        </a>

                        <a href="internal/messages" class="my-2 w-full bg-primary {{ Request::is('internal/messages') ? 'text-secondary border-secondary' : 'text-white border-gray-300' }} border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                            <li class="pb-2">Messages (Admin)</li>
                        </a>

                    <li class="my-2 w-full bg-primary border-b-2 border-dashed hover:text-secondary hover:border-secondary transition ease-out duration-500">
                        <form method="POST" action="{{ route('logoutUser') }}" class="pb-2">
                            @csrf
                            <button type="submit" class="text-white hover:text-secondary hover:border-secondary">
                                <i class="fa-solid fa-door-closed"></i> Logout (Admin)
                            </button>
                        </form>
                    </li>
                    @endauth
                </ul>
            </div>
        </nav>
    </div>
</header>