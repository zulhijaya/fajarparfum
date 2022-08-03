<div x-data class="bg-white">
    <div class="mx-4 lg:mx-10 border-b border-gray-100 py-3">
        <div class="flex items-center justify-between">
            <button x-on:click="$dispatch('open-sidebar')" class="lg:hidden focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 hover:fill-gray-600 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                </svg>
            </button>
            <h1 class="font-extrabold text-lg xl:text-xl">{{ count($titles) ? $titles[count($titles) - 1]['name'] : 'Dashboard' }}</h1>
            <div class="flex items-center">
                <div class="hidden lg:flex items-centet">
                    {{-- <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="w-6 h-6 lg:w-8 lg:h-8 rounded-full mr-2"> --}}
                    <div class="hidden lg:flex items-center text-gray-500">
                        <div class="font-semibold text-xs lg:text-sm mr-0.5">{{ Auth::user()->name }}</div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 lg:px-10 shadow-sm py-2">
        <div class="flex items-center justify-between">
            <div class="overflow-x-auto">
                <div class="flex items-center space-x-1 font-semibold text-xs lg:text-sm">
                    <a href="{{ route('dashboard') }}" class="flex-auto @if( count($titles) != 0 ) text-gray-400 @endif">Dashboard</a>
                    @if( count($titles) )
                        <div class="flex items-center space-x-1">
                        @foreach( $titles as $title )
                            <svg xmlns="http://www.w3.org/2000/svg" class="@if( !$loop->last ) fill-gray-400 @endif h-3 w-3 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                            @if( !$loop->last )
                            <a href="{{ route($title['route']) }}" class="text-gray-400 truncate">{{ $title['name'] }}</a>
                            @else 
                            <div class="truncate">{{ $title['name'] }}</div>
                            @endif
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @if( $create['route'] )
            <x-option :first="true" :delete="false">   
                <a href="{{ route($create['route'], $create['parameter']) }}">
                    <div class="hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                        </svg>
                        <div class="">Tambah</div>
                    </div>
                </a>
            </x-option>
            {{-- <div x-data="{ open: false }" x-on:mouseover.away="open = false" class="relative">
                <div class="flex justify-end">
                    <button x-on:click="open = true" class="group hover:bg-gray-100 flex items-center justify-center w-7 h-7 rounded-full focus:outline-none">
                        <div class="flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 group-hover:fill-gray-600 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                            </svg>
                        </div>
                    </button>
                </div>
                <div x-show="open" class="absolute right-0 z-10" x-cloak>
                    <div class="bg-white w-32 shadow-xl rounded-lg">
                        <a href="{{ route($create_link . '.create') }}">
                            <div class="hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd" />
                                </svg>
                                <div class="font-semibold text-sm">Tambah</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div> --}}
            @endif
        </div>
    </div>
</div>