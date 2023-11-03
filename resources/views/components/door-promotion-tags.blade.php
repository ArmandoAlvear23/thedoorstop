@props(['tagsArr', 'activeFilters'])

<ul class="flex flex-wrap gap-2 content-center mt-4">
    @foreach($tagsArr as $tag)
        @if(isset($activeFilters['promotion']) && is_array($activeFilters['promotion']))
            @if(in_array($tag->id, $activeFilters['promotion']))
                <li
                    class="flex items-center justify-center text-white bg-red-400 border-red-400 border-2 hover:text-black hover:bg-transparent rounded-xl py-1 px-2 text-xs transition ease-out duration-100"
                >
                @if(str_contains('&promotion%5B%5D={{$tag->id}}', Request::getRequestUri()))
                    <a href="{{ str_replace('&promotion%5B%5D='.$tag->id, '', Request::getRequestUri()) }}"><i class="fa-solid fa-x fa-xs"></i> {{ucfirst($tag->name)}}</a>
                @elseif(str_contains('?promotion%5B%5D={{$tag->id}}', Request::getRequestUri()))
                    <a href="{{ str_replace('?promotion%5B%5D='.$tag->id, '', Request::getRequestUri()) }}"><i class="fa-solid fa-x fa-xs"></i> {{ucfirst($tag->name)}}</a>                    
                @else
                    <a href="{{ str_replace('promotion%5B%5D='.$tag->id, '', Request::getRequestUri()) }}"><i class="fa-solid fa-x fa-xs"></i> {{ucfirst($tag->name)}}</a>
                @endif
                </li>
            @else
                {{-- Filter is active, category is not --}}
                <li
                    class="flex items-center justify-center text-black bg-transparent border-2 border-red-400 hover:text-white hover:bg-red-400 rounded-xl py-1 px-3 text-xs transition ease-out duration-200"
                >
                <a href="{{ Request::getRequestUri() }}&promotion%5B%5D={{$tag->id}}"><i class="fa-solid fa-plus fa-xs"></i> {{ ucfirst($tag->name)}}</a>
                </li>
            @endif
        @else
        {{-- No Filters --}}
        <li
            class="flex items-center justify-center text-black bg-transparent border-2 border-red-400 hover:text-white hover:bg-red-400 rounded-xl py-1 px-3 text-xs transition ease-out duration-200"
        >
            <a href="{{ route('indexDoor', 'promotion%5B%5D='.$tag->id) }}">{{ ucfirst($tag->name) }}</a>
        </li>
        @endif
    @endforeach
</ul>