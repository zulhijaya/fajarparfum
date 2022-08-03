<div x-data="{ open: false }" x-on:tes.window="open = false" class="relative font-semibold text-sm">
    <div class="flex justify-end">
        <button x-on:click="open = true" class="group hover:bg-gray-100 flex items-center justify-center w-7 h-7 rounded-full focus:outline-none">
            <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 group-hover:fill-gray-600 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                </svg>
            </div>
        </button>
    </div>
    <div 
        x-show="open"
        class="fixed flex items-end lg:absolute inset-0 lg:left-auto bg-black bg-opacity-70 lg:bg-white lg:bg-opacity-0 z-50 @if( $first ) lg:bottom-auto @endif" 
        x-cloak
    >
        <div 
            x-show="open" 
            x-on:click.outside="open = false;"
            x-transition:enter="transform transition ease-in-out duration-200"
            x-transition:enter-start="translate-y-full"
            x-transition:enter-end="-translate-y-0"
            class="bg-white w-full shadow-xl rounded-t-xl lg:rounded-lg py-2.5 lg:py-0"
        >
            <div class="lg:hidden font-bold text-base px-5 py-2.5 border-b">Pilihan</div>

            {{ $slot }}
            
            @if( $delete )
            <div wire:click="delete({{ $parameter }})" class="hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
                <div>Hapus</div>
            </div>
            @endif
            <div x-on:click="open = false" class="lg:hidden hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                <div>Batal</div>
            </div>
        </div>
    </div>
</div>