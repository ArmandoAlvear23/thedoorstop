<x-layout>
    <h1 class="bg-blue-700 text-white">Hello Vite + Tailwind!</h1>
    <div x-data="{ open: false }">
        <button @click="open = true">Hello</button>
        
        <span x-show="open">
            AlpineJS!
        </span>
    </div>
</x-layout>