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
                                    {{ number_format($product->pivot->stock, 0, '.', '.') }}
                                </td>
                                @endif
                                @if( $subcategory != 'Parfum Refill' )
                                <td class="tbody-td hidden lg:table-cell">Rp{{ number_format($product->price, 0, '.', '.') }}</td>
                                @endif
                                <td class="tbody-td-right">
                                    @php
                                        $delete = !$product->pivot->stock > 0 && $category == 'Parfum';
                                        @endphp
                                    <x-option :first="$loop->first" :parameter="$product->id" :delete="$delete"> 
                                        @if( $category == 'Parfum' )
                                        <x-option-link route="outlet.stock.add" :routedata="[$outlet, $product]" text="Tambah Stok">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                        </x-option-link>  
                                        <x-option-link route="outlet.stock.edit" :routedata="[$outlet, $product]" text="Edit Stok">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                        </x-option-link>
                                        @endif
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
            <div class="font-semibold text-center">Parfum <span class="font-bold text-red-500">{{ $name }}</span> tidak ditemukan. Coba nama yang lain</div>
        </div>
        @endforelse
    </div>
</div>