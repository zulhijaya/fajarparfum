<div x-data="dashboard">
    @if( in_array(auth()->user()->role, ['admin', 'owner', 'manager']) )
    <div class="grid grid-cols-1 xl:grid-cols-4 gap-4 xl:gap-6 mb-4 lg:mb-6 px-4 lg:px-0">
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-red-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-red-500 h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 12v3c0 1.657 3.134 3 7 3s7-1.343 7-3v-3c0 1.657-3.134 3-7 3s-7-1.343-7-3z" />
                            <path d="M3 7v3c0 1.657 3.134 3 7 3s7-1.343 7-3V7c0 1.657-3.134 3-7 3S3 8.657 3 7z" />
                          <path d="M17 5c0 1.657-3.134 3-7 3S3 6.657 3 5s3.134-3 7-3 7 1.343 7 3z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">{{ $total['perfume'] }}</div>
                    <div class="font-semibold text-sm text-gray-500">Total Aroma Parfum</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-blue-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-blue-500 h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zM4 4h3a3 3 0 006 0h3a2 2 0 012 2v9a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2zm2.5 7a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm2.45 4a2.5 2.5 0 10-4.9 0h4.9zM12 9a1 1 0 100 2h3a1 1 0 100-2h-3zm-1 4a1 1 0 011-1h2a1 1 0 110 2h-2a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">{{ $total['member'] }}</div>
                    <div class="font-semibold text-sm text-gray-500">Total Member</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-green-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-green-500 h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">{{ number_format($total['seeds_sold'], 0, '.', '.') }}ml</div>
                    <div class="font-semibold text-sm text-gray-500">Total Bibit Terjual</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-purple-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-purple-500 h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">Rp{{ number_format($incomes->total, 0, '.', '.') }}</div>
                    <div class="font-semibold text-sm text-gray-500">Total Pemasukan</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-teal-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <div class="font-extrabold text-xl text-teal-500">{{ \Carbon\Carbon::now()->isoFormat('ddd') }}</div>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">Rp{{ number_format($incomes->today, 0, '.', '.') }}</div>
                    <div class="font-semibold text-sm text-gray-500">Pemasukan hari ini</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-violet-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <div class="font-extrabold text-xl text-violet-500">{{ \Carbon\Carbon::now()->isoFormat('WW') }}</div>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">Rp{{ number_format($this_week, 0, '.', '.') }}</div>
                    <div class="font-semibold text-sm text-gray-500">Pemasukan minggu ini</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-cyan-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <div class="font-extrabold text-xl text-cyan-500">{{ date('M') }}</div>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">Rp{{ number_format($incomes->this_month, 0, '.', '.') }}</div>
                    <div class="font-semibold text-sm text-gray-500">Pemasukan bulan ini</div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-lg p-8">
            <div class="flex items-center space-x-4">
                <div class="bg-rose-100 rounded-full">
                    <div class="flex items-center justify-center w-12 h-12 xl:w-14 xl:h-14">
                        <div class="font-extrabold text-xl text-rose-500">22</div>
                    </div>
                </div>
                <div>
                    <div class="font-extrabold text-xl mb-0.5">Rp{{ number_format($incomes->this_year, 0, '.', '.') }}</div>
                    <div class="font-semibold text-sm text-gray-500">Pemasukan tahun ini</div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <section>
        <div class="flex flex-col lg:flex-row space-y-2 lg:space-x-6 lg:space-y-0">
            <div class="flex-1 bg-white lg:rounded-xl p-4 lg:p-8 h-full">
                <div class="flex items-center justify-between mb-5">
                    <div class="section-title mb-0">Orderan Terbaru</div>
                    <select wire:model="outlet_id" class="form-input w-36 font-semibold" id="">
                        <option value="">Semua Toko</option>
                        @foreach( $outlets as $outlet )
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                    </select>
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
                                <td class="thead-td w-full">
                                    <div class="flex items-center space-x-1 lg:space-x-2">
                                        <div>Customer</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </td>
                                <td colspan="2" class="thead-td-right">
                                    <div class="flex items-center space-x-1 lg:space-x-2">
                                        <div>Total</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse( $orders as $order )
                            <tr wire:loading.remove>
                                <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                                <td class="tbody-td">{{ $order->user->name ?? 'Bukan Member' }}</td>
                                <td class="tbody-td truncate">Rp{{ number_format($order->total, 0, '.', '.') }}</td>
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
                            @empty
                            <tr wire:loading.remove>
                                <td class="pt-3" colspan="4">Belum ada orderan hari ini</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td wire:loading.class="pt-3" colspan="4">
                                    <div wire:loading.flex class="flex items-center justify-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; display: block; shape-rendering: auto;" class="w-6 h-6" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                            <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1f2937" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                            </circle>
                                        </svg>
                                        <div class="font-semibold">Tunggu sebentar ...</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="flex-1 bg-white lg:rounded-xl p-4 lg:p-8 h-full">
                <div class="flex items-center justify-between mb-5">
                    <div class="section-title mb-0">Parfum Terjual</div>
                    <select wire:model="outlet_id" class="form-input w-36 font-semibold" id="">
                        <option value="">Semua Toko</option>
                        @foreach( $outlets as $outlet )
                        <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
                        @endforeach
                    </select>
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
                                <td class="thead-td w-full">
                                    <div class="flex items-center space-x-1 lg:space-x-2">
                                        <div>Parfum</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </td>
                                <td colspan="2" class="thead-td-right">
                                    <div class="flex items-center space-x-1 lg:space-x-2">
                                        <div>Total</div>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse( $products as $product )
                            <tr wire:loading.remove>
                                <td class="tbody-td-left">{{ $loop->iteration }}.</td>
                                <td class="tbody-td">{{ $product->name }}</td>
                                <td class="tbody-td truncate">{{ number_format($product->total_seeds_sold, 0, '.', '.') }}ml</td>
                                <td class="tbody-td-right">
                                    <x-option :first="$loop->first" :parameter="$product->id" :delete="false">
                                        <div x-on:click="showProductDetail({{ $product }})" class="hover:bg-gray-200 rounded-t-lg flex items-center space-x-2 px-5 py-2.5 lg:py-2 cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lg:h-4 lg:w-4" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                                            </svg>
                                            <div class="truncate">Selengkapnya</div>
                                        </div>
                                    </x-option>
                                </td>
                            </tr>
                            @empty
                            <tr wire:loading.remove>
                                <td class="pt-3" colspan="4">Belum ada parfum yang terjual hari ini</td>
                            </tr>
                            @endforelse
                            <tr>
                                <td wire:loading.class="pt-3" colspan="4">
                                    <div wire:loading.flex class="flex items-center justify-center space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; display: block; shape-rendering: auto;" class="w-6 h-6" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                            <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1f2937" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                                            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                            </circle>
                                        </svg>
                                        <div class="font-semibold">Tunggu sebentar ...</div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                        <div><span class="text-gray-600">Kembalian : </span><span x-text="formatedPrice(order.change)"></span></div>
                    </div>
                </section>
            </div>
        </div>
        
        <div x-show="openProductDetail" class="fixed inset-0 bg-black bg-opacity-30 z-40" x-cloak>
            <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0 overscroll-contain">
                <section name="set-outlet" x-on:click.outside="openProductDetail = false; order = []" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-semibold overscroll-contain">
                    <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4" x-text="'Detail ' + product.name + ' Terjual'"></div>
                    <div class="flex flex-col space-y-2 mb-4">
                        <template x-for="(product, index) in product.order_details">
                        <div class="border-b border-gray-200 pb-2 mb-2">
                            <div class="flex items-center justify-between">
                                <h6><span x-text="product.pivot.seed + 'ml '"></span><span class="text-gray-600" x-text="'(' + product.dosing_type + ')'"></span></h6>
                                <div x-text="getOrderHour(product.created_at)"></div>
                            </div>
                        </div>
                        </template>
                    </div>  
                    <div class="flex justify-end">
                        <div><span class="text-gray-600">Total : </span><span x-text="product.total_seeds_sold + 'ml'"></span></div>
                    </div>
                </section>
            </div>
        </div>
    </section>
 
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
                order: [],
                product: '',
                openOrderDetail: false,
                openProductDetail: false,

                showOrderDetail(order) {
                    this.$dispatch('tes')
                    this.order = order
                    this.openOrderDetail = true
                },

                showProductDetail(product) {
                    this.$dispatch('tes')
                    this.product = product
                    this.openProductDetail = true
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