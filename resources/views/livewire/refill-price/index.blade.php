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
                    <td class="thead-td">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Botol</div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </td>
                    <td class="thead-td w-full">
                        <div class="flex items-center space-x-1 lg:space-x-2">
                            <div>Harga</div>
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
                @foreach( $refill_prices as $refill_price )
                <tr>
                    <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                    <td class="tbody-td">{{ $refill_price['bottle'] }}ml</td>
                    <td class="tbody-td w-full">{{ implode(", ", $refill_price['prices']->toArray()) }}</td>
                    <td class="tbody-td-right">
                        <x-option :first="$loop->first" :parameter="$refill_price['id']">   
                            <x-option-link route="refill-price.edit" :routedata="$refill_price['id']" text="Edit">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </x-option-link>
                        </x-option>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>