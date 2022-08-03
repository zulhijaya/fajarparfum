<div>
    <x-search-product :subcategories="$subcategories"></x-search-product>

    <div wire:loading.remove wire:target="name, subcategory_id">
        @forelse( $products as $category => $categories )
        <div class="@if( $loop->last ) mb-2 lg:mb-4 @endif"></div>
        @foreach( $categories as $subcategory => $subcategories )
        <div class="bg-white lg:rounded-xl p-4 lg:p-8 @if( !$loop->last ) mb-2 lg:mb-4 @endif">
            <div class="section-title">{{ $subcategory }}</div>
            <div class="w-full overflow-x-auto lg:overflow-hidden">
                <table>
                    <thead>
                        <tr>
                            <td class="thead-td-left">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>No</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td class="thead-td w-full">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Nama</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            @if( $category == 'Parfum' )
                            <td class="thead-td truncate">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div><span class="hidden lg:inline">Total </span>Stok</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            @endif
                            @if( $subcategory != 'Parfum Refill' )
                            <td class="thead-td hidden lg:table-cell truncate">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Harga</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            @endif
                            <td class="thead-td-right">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Pilihan</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $subcategories as $product )
                        <tr>
                            <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                            <td class="tbody-td">{{ $product->name }} @if( $product->other_name ) <span class="text-gray-600">({{ $product->other_name }})</span> @endif</td>
                            @if( $category == 'Parfum' )
                            <td class="tbody-td truncate">
                                {{ number_format($product->total_stock, 0, '.', '.') }}
                            </td>
                            @endif
                            @if( $subcategory != 'Parfum Refill' )
                            <td class="tbody-td hidden lg:table-cell">Rp{{ number_format($product->price, 0, '.', '.') }}</td>
                            @endif
                            <td class="tbody-td-right">
                                @php
                                    $delete = !$product->wholesale_prices_count && !$product->outlets_count;
                                @endphp
                                <x-option :first="$loop->first" :parameter="$product->id" :delete="$delete">   
                                    <x-option-link route="product.edit" :routedata="$product" text="Edit">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </x-option-link>
                                    <x-option-link route="product.show" :routedata="$product" text="Selengkapnya">
                                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                    </x-option-link>
                                    <x-option-link route="product.wholesale-price.index" :routedata="$product" text="Harga Grosir">
                                        <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd" />
                                    </x-option-link>
                                </x-option>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endforeach
        @empty
        <div class="bg-white lg:rounded-xl p-4 lg:px-8">
            <div class="font-semibold text-center">Produk <span class="font-bold text-red-500">{{ $name }}</span> tidak ditemukan. Coba nama yang lain</div>
        </div>
        @endforelse
    </div>
</div>