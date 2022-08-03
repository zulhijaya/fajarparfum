<div x-data="wholesale">
    <div class="flex flex-col lg:flex-row space-y-2 lg:space-x-4 lg:space-y-0">
        <div class="basis-full">
            <section name="member" class="bg-white lg:rounded-xl p-4 lg:p-8 lg:mb-4">
                <div class="flex items-center justify-between mb-5">
                    <div class="section-title mb-0">Customer</div>
                    <button x-on:click="openMemberModal = true" type="button" class="hover:bg-gray-200 font-bold rounded-lg border border-gray-400 px-3 py-1 cursor-pointer" x-text="member.name ? 'Ganti' : 'Pilih'"></button>
                </div>
                <div x-show="validateMessage.member" class="font-medium text-red-600 form-mb" x-text="validateMessage.member" x-cloak></div>
                <div x-show="member.name" class="flex items-center">
                    <div class="font-semibold">
                        <span class="capitalize" x-text="member.name"></span><span x-show="member.phone" class="text-gray-600" x-text="' (' + member.phone  + ')'"></span>
                    </div>
                </div>
                <div x-show="!member.name" class="font-medium" x-cloak>
                    Belum ada nama customer
                </div>
                <div x-show="openMemberModal" class="fixed inset-0 bg-black bg-opacity-30 z-50" x-cloak>
                    <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0">
                        <section name="order" x-on:click.outside="cancelSelectMember" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8">
                            <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50">Pilih Customer</div>
                            <div>
                                <label class="form-label">Pencarian</label>
                                <div x-on:click.outside="openSearchMember = false" class="relative">
                                    <input 
                                        wire:model.debounce="search_member" 
                                        x-on:focusin="openSearchMember = true" x-ref="search" 
                                        type="text" class="w-full px-4 py-1.5 font-medium rounded-lg focus:outline-none border border-gray-300 focus:border-gray-800 focus:ring-0 focus:ring-gray-800 placeholder-gray-400" placeholder="klik disini untuk mencari member"
                                    >
                                    <div x-show="openSearchMember" class="absolute mt-0.5 inset-x-0 z-50" x-cloak>
                                        <div wire:loading.remove wire:target="search_member" class="bg-white border shadow-lg rounded-b-lg max-h-64 overflow-y-auto">
                                            @foreach( $members as $character => $characters )
                                            <div class="@if( $loop->last ) pb-2 @endif">
                                                <div class="sticky top-0 bg-white px-4 pt-4 pb-2">
                                                    <h6 class="font-extrabold">{{ $character }}</h6>
                                                </div>
                                                @foreach( $characters as $member )
                                                <div x-on:click="getMember({{ $member }})" class="flex items-center justify-between font-medium hover:bg-gray-200 px-4 py-2 cursor-pointer">
                                                    <div>{{ $member->name }}</div>
                                                    <div class="text-gray-600">{{ $member->phone }}</div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endforeach
                                        </div>
                                        <div wire:loading.block wire:target="search_member" class="bg-white border shadow-lg rounded-b-lg py-2">
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
                                </div>
                            </div>
                            <div class="border-t border-gray-200 my-5"></div>
                            <form x-on:submit.prevent="createNewMember">
                                <div class="form-mb">
                                    <label for="name" class="form-label">Nama</label>
                                    <input x-model="newMember.name" type="text" class="form-input" id="name" placeholder="masukkan nama customer">
                                </div>
                                <div>
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input x-model="newMember.phone" type="number" class="form-input" id="phone" placeholder="masukkan nomor telepon">
                                </div>
                                <div class="flex items-center justify-end space-x-2" :class="openSearchMember ? 'mt-28' : 'mt-8'">
                                    <button type="button" x-on:click="cancelSelectMember" class="flex-1 sm:flex-none font-bold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Batal</button>
                                    <button type="submit" class="flex-1 sm:flex-none bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer">Simpan</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </section>
    
            <div>
                <div x-show="openOrderModal || window.innerWidth > 1024" class="fixed lg:relative inset-0 lg:inset-auto bg-black lg:bg-transparent bg-opacity-30 lg:bg-opacity-0 z-40" x-cloak="mobile">
                    <div class="flex items-center w-full h-full p-4 lg:p-0">
                        <section name="order" x-on:click.outside="cancelMakeOrder" class=" bg-white w-full max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8">
                            <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50">Buat Orderan</div>
                            <form x-on:submit.prevent="storeToOrder">
                                <div x-show="validateMessage.form" class="font-medium text-red-600 form-mb" x-text="validateMessage.form" x-cloak></div>
                                <div class="form-mb">
                                    <label class="form-label">Jenis Grosiran</label>
                                    <div class="overflow-x-auto w-full">
                                        <div class="flex items-center space-x-2">
                                            <label for="produk" class="hover:bg-gray-200 font-medium rounded-full border border-gray-300 px-3 py-1 cursor-pointer" :class="form.wholesaleType == 'produk' && 'bg-gray-800 text-white hover:bg-gray-800'">
                                                <span>Produk</span>
                                                <input x-model="form.wholesaleType" type="radio" class="hidden" id="produk" value="produk">
                                            </label>
                                            <label for="refill" class="hover:bg-gray-200 font-medium rounded-full border border-gray-300 px-3 py-1 cursor-pointer" :class="form.wholesaleType == 'refill' && 'bg-gray-800 text-white hover:bg-gray-800'">
                                                <span>Parfum Refill</span>
                                                <input x-model="form.wholesaleType" type="radio" class="hidden" id="refill" value="refill">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-mb">
                                    <label class="form-label">Pencarian</label>
                                    <div x-on:click.outside="resetSearchProduct" class="relative">
                                        <input 
                                            wire:model.debounce="search_product" 
                                            x-on:focusin="openSearchProduct = true" x-ref="searchProduct" 
                                            type="text" class="w-full px-4 py-1.5 font-medium rounded-lg focus:outline-none border border-gray-300 focus:border-gray-800 focus:ring-0 focus:ring-gray-800 placeholder-gray-400" placeholder="masukkan nama produk" :disabled="!form.wholesaleType"
                                        >
                                        <div x-show="openSearchProduct" class="absolute mt-0.5 inset-x-0 z-50" x-cloak>
                                            <div wire:loading.remove wire:target="search_product" class="bg-white border shadow-lg rounded-b-lg max-h-48 overflow-y-auto">
                                                @forelse( $products as $index => $category )
                                                    <div class="sticky top-0 bg-white px-4 pt-4 pb-2">
                                                        <h6 class="font-extrabold">{{ $index ? $index : 'Botol' }}</h6>
                                                    </div>
                                                    @foreach( $category as $product )
                                                    <div 
                                                        x-on:click="getProduct({{ $product }}, {{ $product->wholesale_prices }})" 
                                                        class="flex items-center justify-between font-medium hover:bg-gray-200 px-4 py-2 cursor-pointer"
                                                    >
                                                        <div>{{ $product->name }}</div>
                                                        @if( $product->subcategory->category->name == 'Parfum' ) <div>{{ $product->pivot->stock }}<span>@if( $product->subcategory->name == 'Parfum Refill' )ml @else botol @endif</span> </div> @endif
                                                    </div>
                                                    @endforeach
                                                @empty
                                                    @if( $search_product )
                                                    <div class="font-medium px-4 py-2">Pencarian <span class="font-semibold">"{{ $search_product }}"</span> tidak ditemukan</div>
                                                    @endif
                                                @endforelse
                                            </div>
                                            <div wire:loading.block wire:target="search_product" class="bg-white border shadow-lg rounded-b-lg py-2">
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
                                    </div>
                                    <div x-show="form.products.length" class="flex flex-wrap items-center mt-1" x-cloak>
                                        <template x-for="(product, index) in form.products" :key="product.id" >
                                            <div class="flex items-center space-x-1 rounded-full border border-gray-300 px-3 py-1 mb-1" :class="index != form.products.length - 1 && 'mr-2'">
                                                <div class="font-medium" x-text="product.name"></div>
                                                <button x-show="form.products.length > 1" type="button" x-on:click="removeProduct(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-gray-400 hover:fill-gray-600 h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div x-show="form.wholesaleType == 'refill' && form.products.length" x-cloak>
                                    <div class="form-mb">
                                        <label class="form-label">Takaran</label>
                                        <select x-model="form.dosingType" class="form-input">
                                            <option value="">masukkan takaran</option>
                                            <option value="Murni">Murni</option>
                                            <option value="Campur">Campur</option>
                                        </select>
                                    </div>
                                    <div class="flex items-start space-x-2 form-mb">
                                        <div class="flex-1">
                                            <label class="form-label">Ukuran Botol</label>
                                            <select x-model="form.bottle" class="form-input">
                                                <option value="">masukkan ukuran botol</option>
                                                <template x-for="bottle in bottles">
                                                <option :value="bottle" x-text="bottle + ' ml'"></option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="flex-1">
                                            <label class="form-label">Bibit</label>
                                            <input x-model="form.seed" type="number" class="form-input" placeholder="masukkan jumlah bibit">
                                        </div>
                                    </div>
                                    <div class="form-mb">
                                        <div class="flex items-center space-x-2">
                                            <div class="basis-full lg:basis-1/2">
                                                <label class="form-label">Parfum Dipilih</label>
                                            </div>
                                            <div class="basis-24 lg:basis-1/2">
                                                <label class="form-label">Qty</label>
                                            </div>
                                        </div>
                                        <div class="flex flex-col">
                                            <template x-for="(product, index) in form.products">
                                                <div class="flex items-center space-x-2" :class="index != form.products.length - 1 && 'mb-2'">
                                                    <div class="basis-full lg:basis-1/2">
                                                        <input type="text" class="form-input" placeholder="masukkan nama toko" :value="product.name" disabled>
                                                    </div>
                                                    <div x-show="form.products.length" class="basis-24 lg:basis-1/2">
                                                        <input type="number" x-model="product.qty" class="form-input" placeholder="masukkan jumlah botol">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                                <div x-show="form.wholesaleType == 'produk' && form.products.length" class="form-mb" x-cloak>
                                    <div class="flex items-center space-x-2 form-mb">
                                        <div class="flex-1">
                                            <label class="form-label">Merek</label>
                                            <select x-model="form.merkName" class="form-input">
                                                <option value="">masukkan merek</option>
                                                <template x-for="merk in productMerks">
                                                <option :value="merk" x-text="merk"></option>
                                                </template>
                                            </select>
                                        </div>
                                        <div class="flex-1">
                                            <label class="form-label">Jumlah</label>
                                            <select x-model="form.merkAmount" class="form-input mb-1">
                                                <option value="">masukkan jumlah</option>
                                                <template x-for="wholesale in wholesales">
                                                <option :value="wholesale.pivot.amount" x-text="wholesale.pivot.amount + ' ' + wholesale.pivot.unit"></option>
                                                </template>
                                                <option value="lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div x-show="form.merkAmount == 'lainnya'" class="flex items-center space-x-2" x-cloak>
                                        <div class="flex-1">
                                            <label class="form-label">Jumlah Lain</label>
                                            <input x-model="form.merkOtherAmount" type="number" class="form-input" placeholder="masukkan jumlah lain">
                                        </div>
                                        <div class="flex-1">
                                            <label class="form-label">Satuan</label>
                                            <select x-model="form.unit" class="form-input">
                                                <option value="">masukkan satuan</option>
                                                <option value="ml">ml</option>
                                                <option value="botol">botol</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-2 form-mb">
                                    <div class="flex-1">
                                        <label class="form-label">Harga</label>
                                        <input x-model="form.price" x-on:input="formatPrice($el)" type="text" class="form-input" placeholder="masukkan harga">
                                    </div>
                                    <div class="flex-1">
                                        <label class="form-label">Qty</label>
                                        <input x-model="form.qty" type="number" class="form-input" placeholder="masukkan berapa botol">
                                    </div> 
                                </div>
                                <div>
                                    <label class="form-label">Total Harga</label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="font-medium text-gray-600">Rp</span>
                                        </div>
                                        <input type="text" class="form-input pl-8" :value="formatedTotal" disabled>
                                    </div>
                                </div>
                                <div class="flex items-center justify-end space-x-2 mt-8">
                                    <button type="button" x-on:click="cancelMakeOrder" class="flex-1 sm:flex-none font-bold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Batal</button>
                                    <button type="submit" class="flex-1 sm:flex-none bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer">Order</button>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <section name="order-list" class="basis-2/5 bg-white h-full lg:rounded-xl p-4 lg:p-8">
            <div class="flex items-center justify-between mb-5">
                <div class="section-title mb-0">Orderan & Pembayaran</div>
                <button x-on:click="openOrderModal = true" type="button" class="lg:hidden hover:bg-gray-200 font-bold rounded-lg border border-gray-400 px-3 py-1 cursor-pointer">Order</button>
            </div>
            <div x-show="orders.length" x-cloak>
                <div class="mb-5">
                    <h6 class="font-semibold text-gray-600 mb-2">Orderan</h6>
                    <div class="flex flex-col space-y-2">
                        <template x-for="(order, index) in orders">
                            <div class="border-b border-gray-200 pb-2 mb-2">
                            <div class="flex justify-between">
                                <h6 class="font-semibold">
                                    <template x-for="(product, i) in order.products">
                                        <span>
                                            <span x-text="product.name"></span>
                                            <span x-show="product.qty" class="text-gray-600" x-text="'(' + product.qty + ')'"></span><span x-show="i != order.products.length - 1">,</span>
                                        </span>
                                    </template>
                                </h6>
                                <div class="font-semibold rounded-lg border border-gray-300 px-1 py-px capitalize h-full ml-2" x-text="order.merkName || order.dosingType"></div>
                            </div>
                            <div class="font-semibold text-gray-600">
                                <span x-text="order.merkAmount + ' ' + order.unit"></span>
                                <span x-show="order.dosingType" x-text="'&middot; ' + order.seed + '/' + order.bottle + 'ml'"></span>
                            </div>
                            <div class="flex items-center justify-between mt-2">
                                <h6 class="font-semibold" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(order.price * order.qty)"></h6>
                                <div class="flex items-center">
                                    <button type="button" x-on:click="decrement(index)" class="hover:bg-gray-200 border border-gray-300 p-0.5 rounded-md focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="mx-3" x-text="order.qty"></div>
                                    <button type="button" x-on:click="increment(index)" class="hover:bg-gray-200 border border-gray-300 p-0.5 rounded-md focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </template>
                    </div>  
                </div>  
                <div>
                    <h6 class="font-semibold text-gray-600 mb-2">Pembayaran</h6>
                    <div class="flex items-center justify-between mb-1">
                        <div class="font-semibold text-gray-600">Jumlah</div>
                        <div class="font-bold" x-text="orders.length"></div>
                    </div>  
                    <div class="flex items-center justify-between mb-2">
                        <div class="font-semibold text-gray-600">Total Harga</div>
                        <div class="font-bold" x-text="'Rp' + totalOrderPrice"></div>
                    </div>  
                    <div>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="font-medium text-gray-600">Rp</span>
                            </div>
                            <input x-model="member.cash" type="text" x-on:keyup="formatPrice($el)" class="form-input pl-8" placeholder="masukkan uang customer">
                        </div>
                    </div>
                </div>  
                <div class="flex items-center justify-end space-x-2 mt-8">
                    <button type="button" x-on:click="cancelOrderPayment" class="flex-1 sm:flex-none font-bold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Batal</button>
                    <button type="button" x-on:click="approveOrder" class="flex-1 sm:flex-none bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer">Proses</button>
                </div>
            </div>
            <div x-show="!orders.length" class="font-medium">
                Belum ada barang yang diorder
            </div>
            
            <div x-show="openOrderApprovalModal" class="fixed inset-0 bg-black bg-opacity-30 z-50" x-cloak>
                <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0">
                    <section name="order" x-on:click.outside="cancelSelectMember" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-medium">
                        <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50" x-text="'Orderan ' + member.name"></div>
                        <div x-show="!isProcessing">
                            <div class="font-medium">Total <span class="font-bold" x-text="'Rp' + totalOrderPrice"></span>. Apakah semua orderan yang dimasukkan sudah benar?</div>
                            <div class="flex items-center justify-end space-x-2" :class="openSearchProduct ? 'mt-32' : 'mt-8'">
                                <button type="button" x-on:click="openOrderApprovalModal = false" class="flex-1 sm:flex-none font-bold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Cek Kembali</button>
                                <button type="button" x-on:click="payOrder" class="flex-1 sm:flex-none bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer">Ya, Bayar</button>
                            </div>
                        </div>
                        <div x-show="isProcessing">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; display: block; shape-rendering: auto;" class="w-6 h-6" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1f2937" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                    </circle>
                                </svg>
                                <div class="font-semibold">Tunggu, orderan sedang diproses</div>
                            </div>
                        </div>
                    </section>
                </div>
            </div> 
            
            
            <div x-show="openSuccessfulModal" class="fixed inset-0 bg-black bg-opacity-30 z-50" x-cloak>
                <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0">
                    <section name="order" x-on:click.outside="cancelSelectMember" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-medium">
                        <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50">Orderan Berhasil</div>
                        <div class="flex items-center justify-between mb-1">
                            <div>Customer</div>
                            <div class="font-bold" x-text="result.name"></div>
                        </div>
                        <div class="flex items-center justify-between mb-1">
                            <div>Uang customer</div>
                            <div class="font-bold" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(result.cash)"></div>
                        </div>
                        <div class="flex items-center justify-between mb-2">
                            <div>Total</div>
                            <div class="font-bold" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(result.total)"></div>
                        </div>
                        <div class="flex items-center justify-between border-t border-gray-200 pt-1">
                            <div x-text="result.change < 0 ? 'Hutang' : 'Kembalian'"></div>
                            <div class="font-bold" x-text="'Rp' + new Intl.NumberFormat('id-ID').format(result.change)"></div>
                        </div>
                        <div class="flex items-center justify-end space-x-2" :class="openSearchProduct ? 'mt-32' : 'mt-8'">
                            <a href="{{ route('order.wholesale') }}" class="flex-1 sm:flex-none">
                                <button type="button" class="w-full font-bold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Order Baru</button>
                            </a>
                            <a href="{{ route('dashboard') }}" class="flex-1 sm:flex-none">
                                <button type="button" class="w-full bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer">Selesai</button>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </section> 
    </div>
 
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('wholesale', () => ({
                bottles: @js($bottles),
                merks: [],
                member: {
                    id: '',
                    name: '',
                    phone: '',
                    cash: ''
                },
                newMember: {
                    name: '',
                    phone: ''
                },

                form: {
                    wholesaleType: '',
                    products: [],
                    dosingType: '',
                    bottle: '',
                    seed: '',
                    merkName: '',
                    merkAmount: '',
                    merkOtherAmount: '',
                    price: '',
                    qty: 1,
                    unit: ''
                },
                validateMessage: {
                    member: '',
                    form: ''
                },
                orders: [],
                result: '',

                openMemberModal: false,
                openOrderModal: false,
                openSearchMember: false,
                openSearchProduct: false,
                openOrderApprovalModal: false,
                openSuccessfulModal: false,

                isProcessing: false,

                init() {
                    this.$watch('form.wholesaleType', () => {
                        this.resetOrderForm()
                    })
                    this.$watch('form.merkName', (value) => {
                        this.form.merkAmount = ''
                        this.form.price = ''
                    })

                    this.$watch('form.merkAmount', (value) => {
                        if( value && value != 'lainnya' ) {
                            const selected = this.merks.find(merk => {
                                return merk.name == this.form.merkName && merk.pivot.amount == value
                            })
                            this.form.price = new Intl.NumberFormat("id-ID").format(selected.pivot.price)
                            this.form.unit = selected.pivot.unit
                        } else { this.form.price = '' }
                    })
                },

                get formatedPrice() {
                    return new Intl.NumberFormat("id-ID").format(this.form.price)
                },

                get formatedTotal() {
                    return new Intl.NumberFormat("id-ID").format(this.form.price.replace(/\./g, '') * this.form.qty)
                },

                get productMerks() {
                    return [...new Set(this.merks.map(merk => merk.name))]
                },

                get wholesales() {
                    return this.merks.filter(merk => {
                        return merk.name == this.form.merkName
                    }).sort((a, b) => {
                        return a.pivot.amount - b.pivot.amount;
                    })
                },

                get totalOrderPrice() {
                    let total = 0
                    this.orders.forEach((order) => {
                        total = total + (order.price * order.qty)
                    })
                    return new Intl.NumberFormat("id-ID").format(total)
                },

                formatPrice(e) {
                    e.value = new Intl.NumberFormat("id-ID").format(e.value.replace(/\./g, ''))
                },

                cancelSelectMember() {
                    this.openMemberModal = false
                    this.newMember.id = ''
                    this.newMember.name = ''
                },

                getMember(member) {
                    this.member.id = member.id
                    this.member.name = member.name
                    this.member.phone = member.phone
                    this.openMemberModal = false
                },

                resetNewMemberForm() {
                    this.newMember.name = ''
                    this.newMember.phone = ''
                    this.openMemberModal = false
                },
    
                createNewMember() {
                    this.member.id = ''
                    this.member.name = this.newMember.name
                    this.member.phone = this.newMember.phone
                    this.resetNewMemberForm()
                },

                cancelMakeOrder() {
                    this.openOrderModal = false
                    this.form.wholesaleType = ''
                    this.resetOrderForm()
                    this.validateMessage.form = ''
                },

                resetOrderForm() {
                    this.merks = []
                    this.form.products = []
                    this.form.dosingType = ''
                    this.form.bottle = ''
                    this.form.seed = ''
                    this.form.merkName = ''
                    this.form.merkAmount = ''
                    this.form.qty = 1
                    this.form.unit = ''
                },

                resetSearchProduct() {
                    this.openSearchProduct = false
                    this.$refs.searchProduct.value = ''
                    this.$wire.set('search_product', '')
                },

                removeProduct(index) {
                    this.form.products.splice(index, 1)
                },

                getProduct(target, merks) {
                    const isExist = this.form.products.some(product => {
                        return product.id == target.id
                    })

                    if( !isExist ) {
                        if( this.form.wholesaleType != 'refill' ) this.form.products = []
                        this.merks = merks
                        this.form.merkName = ''
                        this.form.merkAmount = ''
                        this.form.price = ''
                        this.form.qty = 1
                        this.form.products.push({ id: target.id, name: target.name, qty: this.form.wholesaleType == 'refill' ? 1 : '' })
                    }

                    this.resetSearchProduct()
                },

                storeToOrder() {
                    if( !this.form.wholesaleType || !this.form.products.length || !this.form.price ) {
                        this.validateMessage.form = 'Form tidak boleh ada yang kosong'
                    } else {
                        if( this.form.merkOtherAmount ) {
                            this.form.merkAmount = this.form.merkOtherAmount
                            this.form.merkOtherAmount = ''
                        }
                        const price = this.form.price.replace(/\./g, '')

                        if( this.form.wholesaleType == 'refill' ) {
                            let amount = 0
                            this.form.products.forEach(product => {
                                amount = amount + parseInt(product.qty)
                            })

                            if( amount == 12 ) { 
                                this.form.merkAmount = 1; this.form.unit = 'lusin'
                            } else if( amount == 6 ) { 
                                this.form.merkAmount = '1/2'; this.form.unit = 'lusin'
                            } else { 
                                this.form.merkAmount = amount; this.form.unit = 'botol'
                            }
                        }
                        this.orders.push({ products: this.form.products, dosingType: this.form.dosingType, bottle: this.form.bottle, seed: this.form.seed, merkName: this.form.merkName, merkAmount: this.form.merkAmount, price: price, unit: this.form.unit, qty: this.form.qty })

                        this.form.wholesaleType = ''
                        this.cancelMakeOrder()
                    }
                },

                increment(index) {
                    this.orders[index].qty++
                },

                decrement(index) {
                    this.orders[index].qty--
                    if( this.orders[index].qty == 0 ) this.orders.splice(index, 1)
                },

                cancelOrderPayment() {
                    this.orders = []
                    this.member.id = ''
                    this.member.name = ''
                    this.member.phone = ''
                    this.member.cash = ''
                },

                approveOrder() {
                    if( this.member.name && this.member.cash )  {
                        this.openOrderApprovalModal = true
                    } else {
                        this.validateMessage.member = 'Customer tidak boleh kosong'
                        setTimeout(() => {
                            this.validateMessage.member = ''
                        }, 2000);
                    }
                },

                payOrder() {
                    if( this.member.name && this.member.cash )  {
                        this.isProcessing = true
                        this.$wire.order(this.orders, this.member).then(result => { 
                            this.cancelOrderPayment()
                            this.isProcessing = false
                            this.openOrderApprovalModal = false
                            this.result = result
                            this.openSuccessfulModal = true
                        })
                    } else {
                        this.validateMessage.member = 'Customer tidak boleh kosong'
                        setTimeout(() => {
                            this.validateMessage.member = ''
                        }, 2000);
                    }
                }
            }))
        })
    </script>
</div>