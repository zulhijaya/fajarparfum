<div>
    <div class="bg-white lg:rounded-xl p-4 lg:p-8">
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
                    <td class="thead-td-left lg:thead-td w-full">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Nama</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Ukuran</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Harga</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td-right">
                        <div class="flex items-center justify-end space-x-1 lg:space-x-2">
                            <div>Pilihan</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
                @php
                    $number = 1;
                @endphp
                @foreach( $merks as $index => $merk )
                    @foreach( $merk as $wholesale )
                    <tr>
                        @if( $loop->first )
                        <td rowspan="{{ $merk->count() }}" class="tbody-td-left align-top">{{ $number }}.</td>
                        <td rowspan="{{ $merk->count() }}" class="tbody-td-left lg:tbody-td align-top">{{ $wholesale->name }}</td>
                        @endif
                        <td class="tbody-td">{{ $wholesale->pivot->amount . ($wholesale->name == 'Umum' ? ' ' : '') . $wholesale->pivot->unit }}</td>
                        <td class="tbody-td">Rp{{ number_format($wholesale->pivot->price, 0, '.', '.') }}</td>
                        @if( $loop->first )
                        <td class="tbody-td-right">
                            <x-option :first="$loop->first" :parameter="$wholesale">   
                                {{-- <x-option-link route="product.wholesale-price.edit" :routedata="[$wholesale, $merk]" text="Edit">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </x-option-link> --}}
                            </x-option>
                        </td>
                        @endif 
                    </tr>
                    @endforeach
                    @php
                        $number++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>