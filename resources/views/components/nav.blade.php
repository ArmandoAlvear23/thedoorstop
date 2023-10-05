<header>
    <div class="pt-2 pb px-4 flex justify-between items-center bg-gray-100">
        <div>
            <a href="/">
                <img src="{{ asset("images/the-door-stop-logo.png") }}" alt="The Door Stop" class="w-24">
            </a>
        </div>
        <div>
            <div class="px-4 cursor-pointer">
                <i class="fa-solid fa-bars fa-xl sm:hidden"></i>
            </div>
            <div  class="text-right hidden sm:block">
                <a href="tel:956-574-9071" class="font-bold text-red-600"><span><i class="fa-solid fa-phone fa-shake"></i> (956) 574-9071</span></a>
                <ul class="text-xs text-gray-700">
                    <li>Mon-Fri: 8:30a-5:30p</li>
                    <li>Saturday: 10a-2p</li>
                    <li>Sunday: Closed</li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="bg-primary py-4 px-6 hidden sm:block">
        <ul class="flex space-x-7">
            <li class="{{ Request::is('/doors/modern') ? 'border-b-2 border-secondary' : 'border-b-2 border-primary' }} hover:border-secondary"><a href="/doors/modern" class="text-white uppercase">Modern</a></li>
            <li class="{{ Request::is('/doors/traditional') ? 'border-b-2 border-secondary' : 'border-b-2 border-primary' }} hover:border-secondary"><a href="/doors/traditional" class="text-white uppercase">Traditional</a></li>
            <li class="{{ Request::is('/doors/rustic') ? 'border-b-2 border-secondary' : 'border-b-2 border-primary' }} hover:border-secondary"><a href="/doors/rustic" class="text-white uppercase">Rustic</a></li>
            <li class="{{ Request::is('/doors/rustic') ? 'border-b-2 border-secondary' : 'border-b-2 border-primary' }} hover:border-secondary"><a href="doors/craftsman" class="text-white uppercase">Craftsman</a></li>
            <li class="{{ Request::is('/about') ? 'border-b-2 border-secondary' : 'border-b-2 border-primary' }} hover:border-secondary"><a href="/about" class="text-white uppercase">About</a></li>
            <li class="{{ Request::is('/contact') ? 'border-b-2 border-secondary' : 'border-b-2 border-primary' }} hover:border-secondary"><a href="/contact" class="text-white uppercase">Contact</a></li>
        </ul>
    </nav>
</header>