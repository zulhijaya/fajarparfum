<div x-data="transaction">
    <div class="bg-white h-full p-4 lg:px-8 lg:py-4 rounded-xl mb-2 lg:mb-4">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between lg:space-x-2 space-y-4 lg:space-y-0">
            <div class="basis-full flex items-center justify-between">
                <div class="section-title mb-0">Filter</div>
                <div>
                    <label class="hidden lg:block form-label">Toko</label>
                    <select wire:model="filter.outlet_id" class="form-input w-36">
                        <option value="">Semua Toko</option>
                        @foreach( $outlets as $outlet )
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex-none flex items-center space-x-2">
                <div>
                    <label class="form-label">Tipe</label>
                    <select wire:model="filter.type" class="form-input">
                        <option value="">Semua</option>
                        <option value="eceran">Eceran</option>
                        <option value="grosir">Grosir</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Tanggal</label>
                    <select wire:model="filter.day" class="form-input">
                        <option value=""></option>
                        @for( $date = 1; $date <= 31; $date++ )
                        <option value="{{ $date }}">{{ $date }}</option>
                        @endfor
                    </select>
                </div>
                <div>
                    <label class="form-label">Bulan</label>
                    <select wire:model="filter.month" class="form-input">
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div>
                    <label class="form-label">Tahun</label>
                    <select wire:model="filter.year" class="form-input">
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div wire:loading.remove>
        @forelse( $orders as $date => $listOrders ) 
        <div class="bg-white lg:rounded-xl p-4 lg:p-8 mb-2 lg:mb-4">
            <div class="flex items-center justify-between mb-5">
                <div class="section-title mb-0">{{ $date }}</div>
                <div class="font-semibold"><span class="text-gray-600">Total : </span>Rp{{ number_format($listOrders->sum('total'), 0, '.', '.') }}</div>
            </div>
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
                            <td class="thead-td">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Invoice</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td class="thead-td w-full">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Customer</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td class="hidden lg:table-cell thead-td">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Qty</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td class="hidden lg:table-cell thead-td">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Jam</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td class="thead-td">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Total</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                            <td class="hidden lg:table-cell thead-td-right">
                                <div class="flex items-center space-x-1 lg:space-x-2">
                                    <div>Kembalian</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $listOrders as $order )
                        <tr>
                            <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                            <td class="tbody-td truncate">{{ $order->invoice }}</td>
                            <td class="tbody-td">{{ $order->user_id ? $order->user->name : 'Bukan Member' }}</td>
                            <td class="hidden lg:table-cell tbody-td">{{ $order->total_qty }}</td>
                            <td class="hidden lg:table-cell tbody-td">{{ $order->created_at->format('H:i') }}</td>
                            <td class="tbody-td">Rp{{ number_format($order->total, 0, '.', '.') }}</td>
                            <td class="hidden lg:table-cell tbody-td">Rp{{ number_format($order->change, 0, '.', '.') }}</td>
                            <td class="tbody-td-right">
                                <x-option :first="$loop->first" :parameter="$order->id" :delete="false">   
                                    <div x-on:click="showOrderDetail({{ $order }})" class="hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                        </svg>
                                        <div class="truncate">Selengkapnya</div>
                                    </div>
                                </x-option>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @empty
        <div class="bg-white lg:rounded-xl p-4 lg:px-8">
            <div class="font-semibold text-center">Laporan transaksi tidak ditemukan</div>
        </div>
        @endforelse
    </div>
    <div wire:loading.block class="bg-white lg:rounded-xl p-4 lg:px-8">
        <div class="flex items-center justify-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; display: block; shape-rendering: auto;" class="w-6 h-6" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1f2937" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                </circle>
            </svg>
            <div class="font-semibold">Tunggu sebentar ...</div>
        </div>
    </div>

    <div x-show="openOrderDetail" class="fixed inset-0 bg-black bg-opacity-30 z-40" x-cloak>
        <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0 overscroll-contain">
            <section name="set-outlet" x-on:click.outside="openOrderDetail = false; order = []" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-semibold overscroll-contain">
                <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4" x-text="'Detail Orderan ' + (order.user_id ? order.user.name : '')"></div>
                <div class="flex items-center justify-between mb-2">
                    <div x-text="order.invoice"></div>
                    <div><span class="text-gray-600">Jam : </span><span x-text="getOrderHour(order.created_at)"></span></div>
                </div>
                <div class="flex flex-col space-y-2 mb-4">
                    <template x-for="(order, index) in order.order_details">
                    <div class="border-b border-gray-200 pb-2 mb-2">
                        <h6>
                            <template x-for="(product, i) in order.products">
                                <span>
                                    <span x-text="product.name"></span>
                                    <span x-show="order.bottle && !product.pivot.qty" class="text-gray-600" x-text="'(' + product.pivot.seed + ')'"></span>
                                    <span x-show="product.pivot.qty" class="text-gray-600" x-text="'(' + product.pivot.qty + ')'"></span><span x-show="i != order.products.length - 1">,</span>
                                </span>
                            </template>
                            <span x-show="order.bottle">
                                <span x-text="'&middot; ' + (order.products[0].pivot.qty ? order.products[0].pivot.seed + '/' : '') + order.bottle + 'ml'"></span>
                                <span class="text-gray-600" x-text="'(' + order.dosing_type + ')'"></span>
                            </span>
                            <span x-show="order.amount" class="text-gray-600" x-text="'(' + (order.amount ? order.amount + ' ' + order.unit : '') + ')'"></span>
                        </h6>
                        <div class="flex items-center justify-between mt-3">
                            <h6 class="font-semibold" x-text="order.price != 0 ? formatedPrice(order.price * order.qty) : 'Bonus'"></h6>
                            <div class="font-semibold" x-text="'x' + order.qty"></div>
                        </div>
                    </div>
                    </template>
                </div>  
                <div class="flex justify-end">
                    <div>
                        <table>
                            <tr>
                                <td class="pb-1 text-gray-600 pr-1">Total</td>
                                <td class="pb-1" x-text="': ' + formatedPrice(order.total)"></td>
                            </tr>
                            <tr>
                                <td class="text-gray-600 pr-1">Kembalian</td>
                                <td x-text="': ' + formatedPrice(order.change)"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
 
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('transaction', () => ({
                order: [],
                openOrderDetail: false,

                showOrderDetail(order) {
                    this.$dispatch('tes')
                    this.order = order
                    this.openOrderDetail = true
                },
            
                formatedPrice(price) {
                    return 'Rp' + new Intl.NumberFormat('id-ID').format(price)
                },

                getOrderHour(createdAt) {
                    const time = new Date(createdAt)
                    return time.getHours() + ":" + time.getMinutes()
                }
            }))
        })
    </script>
</div>