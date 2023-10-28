<nav class="bg-gray-600 py-1 px-6 hidden sm:block shadow-md">
    <ul class="flex sm:space-x-7 lg:justify-center">
        <li class="{{ Request::is('doors') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500"><a href="/doors" class="text-white uppercase text-sm">Doors</a></li>
        <li class="{{ Request::is('internal/doors/create') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500"><a href="/internal/doors/create" class="text-white uppercase text-sm">Upload Door</a></li>
        <li class="{{ Request::is('internal/door/categories') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500"><a href="/internal/door/categories" class="text-white uppercase text-sm">Categories</a></li>
        <li class="{{ Request::is('internal/messages') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500"><a href="/internal/messages" class="text-white uppercase text-sm">Messages</a></li>
        <li>
            <form method="POST" action="internal/logout" class="inline">
                @csrf
                <button type="submit" class="text-white">
                    <i class="fa-solid fa-door-closed"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

