<div>
    <div class="bg-white lg:rounded-xl p-4 lg:p-8">
        <table class="mb-28">
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
                    <td class="thead-td w-full lg:w-auto">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Nama</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td hidden lg:table-cell w-full">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Alamat</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td hidden lg:table-cell truncate">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Karyawan</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td truncate">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Tipe</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td hidden lg:table-cell truncate">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Status</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
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
                @foreach( $outlets as $outlet )
                <tr>
                    <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                    <td class="tbody-td lg:truncate">{{ $outlet->name }}</td>
                    <td class="tbody-td hidden lg:table-cell">{{ $outlet->address }}</td>
                    <td class="tbody-td hidden lg:table-cell">{{ $outlet->employees_count }} org</td>
                    <td class="tbody-td capitalize truncate">{{ $outlet->type }}</td>
                    <td class="tbody-td hidden lg:table-cell capitalize">
                        @if( $outlet->status == 'buka' )
                        <div class="bg-green-50 flex items-center justify-center px-3 py-1.5 rounded-full">
                            <div class="text-green-500">{{ $outlet->status }}</div>
                        </div>
                        @elseif( $outlet->status == 'tutup' )
                        <div class="bg-red-50 flex items-center justify-center px-3 py-1.5 rounded-full">
                            <div class="text-red-500">{{ $outlet->status }}</div>
                        </div>
                        @else
                        <div class="bg-red-500 flex items-center justify-center px-3 py-1.5 rounded-full">
                            <div class="text-white">{{ $outlet->status }}</div>
                        </div>
                        @endif
                    </td>
                    <td class="tbody-td-right">
                        <x-option :first="$loop->first" :parameter="$outlet->id" :delete="!$outlet->stocks_count && !$outlet->employees_count">   
                            <x-option-link route="outlet.edit" :routedata="$outlet" text="Edit">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </x-option-link>
                            <x-option-link route="outlet.show" :routedata="$outlet" text="Selengkapnya">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </x-option-link>
                            <x-option-link route="outlet.stock.index" :routedata="$outlet" text="Stok">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                            </x-option-link>
                            @if( $outlet->type == 'toko utama' && $outlet->stocks_count )
                            <x-option-link route="outlet.stock.send" :routedata="$outlet" text="Kirim Stok">
                                <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z" />
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