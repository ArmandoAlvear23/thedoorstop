<li class="{{ Route::is('indexDoor') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500">
    <a href="{{ route('indexDoor') }}" class="text-white uppercase text-sm">Doors</a>
</li>
<li class="{{ Route::is('createDoor') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500">
    <a href="{{ route('createDoor') }}" class="text-white uppercase text-sm">Upload Door</a>
</li>
<li class="{{ Route::is('indexCategory') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500">
    <a href="{{ route('indexCategory') }}" class="text-white uppercase text-sm">Categories</a>
</li>
<li class="{{ Route::is('indexMessage') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500">
    <a href="{{ route('indexMessage') }}" class="text-white uppercase text-sm">Messages</a>
</li>
<li class="{{ Route::is('indexTestimonial') ? 'border-white' : 'border-transparent' }} border-b-2 hover:border-white transition ease-out duration-500">
    <a href="{{ route('indexTestimonial') }}" class="text-white uppercase text-sm">Testimonials</a>
</li>
<li>
    <form method="POST" action="{{ route('logoutUser') }}" class="inline">
        @csrf
        <button type="submit" class="text-white">
            <i class="fa-solid fa-door-closed"></i> Logout
        </button>
    </form>
</li>
