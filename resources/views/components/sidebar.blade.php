<div 
    x-data="{ open: false }" 
    @open-sidebar.window="open = true" 
    x-show="open || innerWidth >= 1024" 
    class="fixed z-50" :class="open && innerWidth <= 1024 ? 'inset-0 bg-black bg-opacity-30' : ''" 
    x-cloak="mobile"
>
    <div 
        x-show="open || innerWidth >= 1024"
        x-transition:enter="transform transition ease-in-out duration-200"
        x-transition:enter-start="-translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-on:click.outside="open = false" class="w-56 lg:w-52 h-screen bg-gray-800 pt-3 pb-6 overflow-y-auto overscroll-contain">
        <div class="px-5 mb-6 lg:mb-8">
            <a href="#">
                <h1 class="font-extrabold text-xl text-white">Fajar Parfum</h1>
            </a>
            <h1 class="font-semibold text-white text-sm mt-2">Pusat Parfum Refill Kualitas Import</h1>
        </div>
        <ul class="text-sm text-gray-300">
            <li class="group">
                <a href="{{ route('dashboard') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('admin.dashboard') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('admin.dashboard') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('admin.dashboard') ) text-white @endif font-semibold">Dashboard</div>
                    </div>
                </a>
            </li>
            @if( in_array(auth()->user()->role, ['admin', 'owner', 'manager']) )
            <li class="group">
                <a href="{{ route('merk.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('merk.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('merk.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('merk.index') ) text-white @endif font-semibold">Merek</div>
                    </div>
                </a>
            </li>
            <li class="group">
                <a href="{{ route('category.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('category.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('category.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('category.index') ) text-white @endif font-semibold">Kategori</div>
                    </div>
                </a>
            </li>
            <li class="group">
                <a href="{{ route('subcategory.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('subcategory.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('subcategory.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('subcategory.index') ) text-white @endif font-semibold">Sub Kategori</div>
                    </div>
                </a>
            </li>
            <li class="group">
                <a href="{{ route('product.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('product.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('admin.dataset.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                                <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                                <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('product.index') ) text-white @endif font-semibold">Produk</div>
                    </div>
                </a>
            </li>
            <li class="group">
                <a href="{{ route('tag.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('tag.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('admin.dataset.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('tag.index') ) text-white @endif font-semibold">Penanda</div>
                    </div>
                </a>
            </li>
            @endif
            <li class="group">
                <a href="{{ route('outlet.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('outlet.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('outlet.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('outlet.index') ) text-white @endif font-semibold">Toko</div>
                    </div>
                </a>
            </li>
            @if( in_array(auth()->user()->role, ['admin', 'owner', 'manager']) )
            <li class="group">
                <a href="{{ route('refill-price.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('refill-price.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('refill-price.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('refill-price.index') ) text-white @endif font-semibold">Harga Refill</div>
                    </div>
                </a>
            </li>
            @endif
            <div x-data="{ open: false }">
                <li x-on:click="open = !open" class="group">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('order.retail') || Route::is('order.wholesale') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('order.retail') || Route::is('order.wholesale') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('order.retail') || Route::is('order.wholesale') ) text-white @endif font-semibold">Order</div>
                    </div>
                </li>
                <div x-show="open" x-on:click.outside="open = false" x-cloak>
                    <li class="group">
                        <a href="{{ route('order.retail') }}">
                            <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('order.retail') ) bg-gray-900 @endif cursor-pointer">
                                <div class="group-hover:text-white @if( Route::is('order.retail') ) text-white @endif font-semibold ml-8">Eceran</div>
                            </div>
                        </a>
                    </li>
                    <li class="group">
                        <a href="{{ route('order.wholesale') }}">
                            <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('order.wholesale') ) bg-gray-900 @endif cursor-pointer">
                                <div class="group-hover:text-white @if( Route::is('order.wholesale') ) text-white @endif font-semibold ml-8">Grosir</div>
                            </div>
                        </a>
                    </li>
                </div>
            </div>
            @if( in_array(auth()->user()->role, ['admin', 'owner', 'manager']) )
            <div x-data="{ open: false }">
                <li x-on:click="open = !open" class="group">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('order.retail') || Route::is('order.wholesale') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('order.retail') || Route::is('order.wholesale') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm2 10a1 1 0 10-2 0v3a1 1 0 102 0v-3zm2-3a1 1 0 011 1v5a1 1 0 11-2 0v-5a1 1 0 011-1zm4-1a1 1 0 10-2 0v7a1 1 0 102 0V8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('order.retail') || Route::is('order.wholesale') ) text-white @endif font-semibold">Laporan</div>
                    </div>
                </li>
                <div x-show="open" x-on:click.outside="open = false" x-cloak>
                    <li class="group">
                        <a href="{{ route('report.transaction') }}">
                            <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('report.transaction') ) bg-gray-900 @endif cursor-pointer">
                                <div class="group-hover:text-white @if( Route::is('report.transaction') ) text-white @endif font-semibold ml-8">Transaksi</div>
                            </div>
                        </a>
                    </li>
                    <li class="group">
                        <a href="{{ route('report.income') }}">
                            <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('report.income') ) bg-gray-900 @endif cursor-pointer">
                                <div class="group-hover:text-white @if( Route::is('report.income') ) text-white @endif font-semibold ml-8">Pemasukan</div>
                            </div>
                        </a>
                    </li>
                </div>
            </div>
            <li class="group">
                <a href="{{ route('user.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('user.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('admin.admin.edit') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('user.index') ) text-white @endif font-semibold">User</div>
                    </div>
                </a>
            </li>
            <li class="group">
                <a href="{{ route('member.index') }}">
                    <div class="flex items-center space-x-3 px-5 py-3.5 hover:bg-gray-900 @if( Route::is('member.index') ) bg-gray-900 @endif cursor-pointer">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:fill-white @if( Route::is('admin.user.index') ) fill-white @endif h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </div>
                        <div class="group-hover:text-white @if( Route::is('member.index') ) text-white @endif font-semibold">Member</div>
                    </div>
                </a>
            </li>
            @endif
            <li class="px-5 py-3.5 hover:text-white hover:bg-gray-900 cursor-pointer">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        <div class="flex items-center space-x-3">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-300 h-4 w-4 xl:h-5 xl:w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="font-semibold">Logout</div>
                        </div>
                    </a>
                </form>
            </li>
        </ul>
    </div>
</div>