<a href="{{ route($route, $routedata) }}">
    <div class="hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
            {{ $slot }}
        </svg>

        <div class="truncate">{{ $text }}</div>
    </div>
</a>