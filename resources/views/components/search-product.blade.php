<div>
    <div x-data="{ open: false }">
        <div class="bg-white h-full p-4 lg:px-8 lg:py-4 z-50" :class="open ? 'lg:rounded-t-xl' : 'lg:rounded-xl mb-2 lg:mb-4'">
            <div class="flex items-center justify-between">
                <div class="section-title mb-0" :class="open && 'mb-2'">Pencarian</div>
                <button x-on:click="open = !open; if( !open ) { $wire.resetSearching() }" class="group hover:bg-gray-100 flex items-center justify-center w-7 h-7 rounded-full focus:outline-none">
                    <div class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 group-hover:fill-gray-600 h-5 w-5 transition ease-in-out duration-300 transform" :class="open ? 'rotate-180' : 'rotate-0'" viewBox="0 0 20 20" fill="currentColor"> 
                            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>    
            </div>
        </div>
        <div
            x-show="open"
            x-transition:enter="transition ease-in-out duration-200" 
            x-transition:enter-start="-translate-y-1/2" 
            x-transition:enter-end="translate-y-0" 
            class="bg-white lg:rounded-b-xl px-4 pb-4 lg:px-8 lg:pb-8 mb-2 lg:mb-4 z-0"
            x-cloak
        >
            <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-2 space-y-3 lg:space-y-0">
                <div class="basis-full">
                    <label class="form-label">Nama :</label>
                    <input wire:model.debounce="name" type="text" class="form-input" placeholder="masukkan nama, penanda parfum atau botol">
                </div>
                <div class="basis-full lg:basis-72">
                    <label class="form-label">Jenis Produk :</label>
                    <select wire:model="subcategory_id" class="form-input">
                        <option value="">masukkan jenis produk</option>
                        @foreach( $subcategories as $category )
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div wire:loading.block wire:target="name, subcategory_id" class="bg-white lg:rounded-xl p-4 lg:px-8">
        <div class="flex items-center justify-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; display: block; shape-rendering: auto;" class="w-6 h-6" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1f2937" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                </circle>
            </svg>
            <div class="font-semibold">Tunggu sebentar ...</div>
        </div>
    </div>
</div>