@if(session()->has('message'))
    <button type="button" x-data="{show: true}" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition.duration.300ms class="fixed right-4 top-4 z-50 rounded-md bg-green-500 px-4 py-2 text-white transition hover:bg-green-600">
        <div class="flex items-center space-x-2">
            <span class="text-3xl"><i class="bx bx-check"></i></span>
            <p class="font-bold">{{ session('message') }}</p>
        </div>
    </button>
@endif