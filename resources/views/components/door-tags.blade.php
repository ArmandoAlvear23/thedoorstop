@props(['tagsArr', 'activeFilters'])

<ul class="flex">
    @foreach($tagsArr as $tag)
        @if(isset($activeFilters['category']) && is_array($activeFilters['category']))
            @if(in_array($tag->id, $activeFilters['category']))
                <li
                    class="flex items-center justify-center bg-primary border-secondary border-2 hover:bg-secondary text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                @if(str_contains('&category%5B%5D={{$tag->id}}', Request::getRequestUri()))
                    <a href="{{ str_replace('&category%5B%5D='.$tag->id, '', Request::getRequestUri()) }}"><i class="fa-solid fa-x fa-xs"></i> {{ucfirst($tag->name)}}</a>
                @else
                    <a href="{{ str_replace('category%5B%5D='.$tag->id, '', Request::getRequestUri()) }}"><i class="fa-solid fa-x fa-xs"></i> {{ucfirst($tag->name)}}</a>
                @endif
                </li>
            @else
                <li
                    class="flex items-center justify-center bg-primary hover:bg-secondary text-white rounded-xl py-1 px-3 mr-2 text-xs"
                >
                <a href="{{ Request::getRequestUri() }}&category%5B%5D={{$tag->id}}"><i class="fa-solid fa-plus fa-xs"></i> {{ ucfirst($tag->name)}}</a>
                </li>
            @endif
        @else
        <li
            class="flex items-center justify-center bg-primary hover:bg-secondary text-white rounded-xl py-1 px-3 mr-2 text-xs"
        >
            <a href="/doors?category%5B%5D={{$tag->id}}">{{ucfirst($tag->name)}}</a>
        </li>
        @endif
    @endforeach
</ul>