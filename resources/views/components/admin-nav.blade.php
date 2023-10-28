<nav class="bg-secondary py-1 px-6 hidden sm:block shadow-md">
    <ul class="flex sm:space-x-7 lg:justify-center">
        <li class="{{ Request::is('/doors') ? 'border-primary' : 'border-transparent' }} border-b-2 hover:border-primary transition ease-out duration-500"><a href="/doors" class="text-white uppercase text-sm">Doors</a></li>
        <li class="{{ Request::is('internal/door/categories') ? 'border-primary' : 'border-transparent' }} border-b-2 hover:border-primary transition ease-out duration-500"><a href="/internal/door/categories" class="text-white uppercase text-sm">Categories</a></li>
        <li class="{{ Request::is('internal/messages') ? 'border-primary' : 'border-transparent' }} border-b-2 hover:border-primary transition ease-out duration-500"><a href="/internal/messages" class="text-white uppercase text-sm">Messages</a></li>
    </ul>
</nav>

