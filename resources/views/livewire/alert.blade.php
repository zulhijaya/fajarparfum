{{-- <div 
    x-data="{ open: false }" 
    x-show="open" 
    @close-alert.window="
        open = true;
        setTimeout(() => {
            open = false;
        }, 5000);
    "
    class="px-4 pb-2 lg:p-0 lg:fixed lg:inset-x-auto bottom-3 lg:right-3 z-50" 
    x-cloak
>
    <div class="bg-green-100 w-full lg:w-64 xl:w-72 rounded-xl border border-green-200 shadow p-1.5">
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-green-600 rounded-xl p-1 mr-3">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h6 class="font-semibold text-sm">User berhasil ditambahkan</h6>
            </div>
        </div>
    </div>
</div> --}}

<div 
    x-data="{ open: @entangle('open') }" 
    x-init="$watch('open', value => console.log('ok'))"
    class="fixed inset-x-4 top-3 lg:inset-x-auto lg:top-3 lg:right-3 z-50" x-cloak>
    <div 
        x-show="open" 
        x-transition:enter="transform transition ease-in-out duration-200"
        x-transition:enter-start="-translate-y-20"
        x-transition:enter-end="translate-y-0"
        class="bg-green-100 w-full lg:w-64 xl:w-72 rounded-xl border border-green-300 shadow p-2"
        x-on:close-alert.window="
            open = true;
            setTimeout(() => {
                open = false;
            }, 5000);
        "
    >
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="bg-green-600 rounded-xl p-1 mr-4">
                    <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <h6 class="font-medium text-sm xl:text-base">Berhasil</h6>
            </div>
            <button class="hover:bg-white rounded-lg p-1 focus:outline-none">
                <svg class="w-4 h-4 font-bold text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    </div>
</div>