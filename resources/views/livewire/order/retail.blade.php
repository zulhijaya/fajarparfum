<div x-data="retail">
    <div x-show="!outlet" class="fixed inset-0 bg-black bg-opacity-30 z-40" x-cloak>
        <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0">
            <section name="set-outlet" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-medium">
                <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4">Pilih Toko</div>
                <div wire:loading.remove.flex>
                    @forelse( $outlets as $outlet ) 
                    <div wire:click="setOutlet({{ $outlet->id }})" class="hover:bg-gray-200 border border-gray-300 rounded-lg p-2 lg:p-4 cursor-pointer @if( !$loop->last ) mb-2 @endif">
                        <div class="flex items-center justify-between mb-2">
                            <div class="font-bold">{{ $outlet->name }}</div>
                            <div class="border border-gray-300 rounded-full px-2 py-0.5 font-semibold capitalize">{{ $outlet->type }}</div>
                        </div>
                        <div class="font-medium">{{ $outlet->address }}</div>
                    </div>
                    @empty
                    <div class="font-medium">Belum ada toko yang buka</div>
                    @endforelse
                </div>
                <div wire:loading.flex class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="background: none; display: block; shape-rendering: auto;" class="w-6 h-6" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                        <circle cx="50" cy="50" r="32" stroke-width="8" stroke="#1f2937" stroke-dasharray="50.26548245743669 50.26548245743669" fill="none" stroke-linecap="round">
                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                        </circle>
                    </svg>
                    <div class="font-semibold">Tunggu, sedang memilih toko</div>
                </div>
            </section>
        </div>
    </div>
    <div x-show="outlet" x-cloak>
        <section name="outlet-information" class="bg-blue-100 lg:rounded-xl px-4 py-2 lg:px-8 lg:py-4 mb-2 lg:mb-4">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-2 lg:space-y-0">
                @if( $target_outlet )
                <div class="font-extrabold">{{ $target_outlet->name }}</div>
                <div class="font-medium">{{ $target_outlet->address }}</div>
                @endif
            </div>
        </section>
        <div class="flex flex-col lg:flex-row space-y-2 lg:space-x-4 lg:space-y-0">
            <div class="basis-full">
                <section name="member" class="bg-white lg:rounded-xl p-4 lg:p-8 lg:mb-4">
                    <div class="flex items-center justify-between mb-5">
                        <div class="section-title mb-0">Customer</div>
                        <div class="flex items-center space-x-2">
                            <button x-on:click="openMemberModal = true" type="button" class="hover:bg-gray-200 font-bold rounded-lg border border-gray-400 px-3 py-1 cursor-pointer" x-text="member.name ? 'Ganti' : 'Pilih'"></button>
                            <button x-show="member.previousOrders.length" x-on:click="openMemberCard = true" type="button" class="hover:bg-gray-200 font-bold rounded-lg border border-gray-400 px-3 py-1 cursor-pointer" x-cloak>Kartu member</button>
                        </div>
                    </div>
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
                                    <div x-on:click.outside="resetSearchMember" class="relative">
                                        <input 
                                            wire:model.debounce="search_member" 
                                            x-on:focusin="openSearchMember = true" x-ref="searchMember" 
                                            type="text" class="w-full px-4 py-1.5 font-medium rounded-lg focus:outline-none border border-gray-300 focus:border-gray-800 focus:ring-0 focus:ring-gray-800 placeholder-gray-400" placeholder="klik disini untuk mencari member"
                                        >
                                        <div x-show="openSearchMember" class="absolute mt-0.5 inset-x-0 z-50" x-cloak>
                                            <div wire:loading.remove wire:target="search_member" class="bg-white border shadow-lg rounded-b-lg max-h-48 overflow-y-auto">
                                                @forelse( $members as $character => $characters )
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
                                                @empty
                                                @if( $search_member )
                                                <div class="font-medium px-4 py-2">Pencarian <span class="font-semibold">"{{ $search_member }}"</span> tidak ditemukan</div>
                                                @endif
                                                @endforelse
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
                                        <label for="phone" class="form-label">Nama</label>
                                        <input x-model="newMember.name" type="text" class="form-input" id="phone" placeholder="masukkan nama customer">
                                    </div>
                                    <div>
                                        <label for="phone" class="form-label">Nomor Telepon</label>
                                        <input x-model="newMember.phone" type="number" class="form-input" id="phone" placeholder="masukkan nomor telepon">
                                    </div>
                                    <div class="flex items-center justify-end space-x-2 mt-8">
                                        <button type="button" x-on:click="cancelSelectMember" class="flex-1 sm:flex-none font-bold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Batal</button>
                                        <button type="submit" class="flex-1 sm:flex-none bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer">Simpan</button>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
    
                    <div x-show="openMemberCard" class="fixed inset-0 bg-black bg-opacity-30 z-50" x-cloak>
                        <div class="flex items-center lg:justify-center w-full h-full p-4 lg:py-0">
                            <section name="order" x-on:click.outside="openMemberCard = false" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-medium">
                                <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50">Kartu Member</div>
                                <div class="overflow-y-auto max-h-56">
                                    <template x-for="card in member.previousOrders">
                                        <div class="font-semibold border border-gray-300 rounded-lg p-2 lg:p-4 mb-2 lg:mb-4" :class="card.length == 5 && 'bg-red-100'">
                                            <template x-for="(order, index) in card">
                                                <div class="flex items-start justify-between" :class="(index == card.length - 1 && card.length == 5) ? 'mb-0' : 'mb-2.5'">
                                                    <div>
                                                        <template x-for="(product, i) in order.ordered_products">
                                                        <span>
                                                            <span x-text="product.name"></span>
                                                            <span class="text-gray-600" x-text="'(' + product.pivot.seed + ')'"></span><span x-show="i != order.ordered_products.length - 1">,</span>
                                                        </span>
                                                        </template>
                                                        <span x-text="'&middot; ' + order.bottle + 'ml'"></span>
                                                        <span class="text-gray-600" x-text="'(' + order.dosing_type + ')'"></span>
                                                    </div>
                                                    <div x-text="formatedPrice(order.price)"></div>
                                                </div>
                                            </template>
                                            <template x-for="i in 5 - card.length">
                                            <div class="flex items-start justify-between" :class="i != 5 - card.length && 'mb-2.5'">
                                                <div class="text-gray-600">Belum ada orderan</div>
                                            </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </section>
                        </div>
                    </div>
                </section>
    
                <div>
                    <div x-show="openOrderModal || window.innerWidth > 1024" class="fixed lg:relative inset-0 lg:inset-auto bg-black lg:bg-transparent bg-opacity-30 lg:bg-opacity-0 z-40" x-cloak="mobile">
                        <div class="flex items-center w-full h-full p-4 lg:p-0">
                            <section name="order" x-on:click.outside="cancelMakeOrder" class=" bg-white w-full max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8">
                                <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50">Buat <span x-show="formType == 'bonus'" x-cloak>Bonus</span> Orderan</div>
                                <form x-on:submit.prevent="storeToOrder">
                                    <div x-show="validateMessage.form" class="font-medium text-red-600 form-mb" x-text="validateMessage.form" x-cloak></div>
                                    <div class="form-mb">
                                        <label class="form-label">Pencarian</label>
                                        <div x-on:click.outside="resetSearchProduct" class="relative">
                                            <input 
                                                wire:model.debounce="search_product" 
                                                x-on:focusin="openSearchProduct = true" x-ref="searchProduct" 
                                                type="text" class="w-full px-4 py-1.5 font-medium rounded-lg focus:outline-none border border-gray-300 focus:border-gray-800 focus:ring-0 focus:ring-gray-800 placeholder-gray-400" placeholder="masukkan nama produk"
                                            >
                                            <div x-show="openSearchProduct" class="absolute mt-0.5 inset-x-0 z-50" x-cloak>
                                                <div wire:loading.remove wire:target="search_product" class="bg-white border shadow-lg rounded-b-lg max-h-48 overflow-y-auto">
                                                    @forelse( $products as $index => $category )
                                                        <div class="sticky top-0 bg-white px-4 pt-4 pb-2">
                                                            <h6 class="font-extrabold">{{ $index ? $index : 'Botol' }}</h6>
                                                        </div>
                                                        @foreach( $category as $product )
                                                        <div 
                                                            x-on:click="getProduct({{ $product }})" 
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
                                    <div x-show="form.products.length && form.products[0].subcategory == 'Parfum Refill'" x-cloak>
                                        <div :class="formType == 'bonus' && 'flex items-center space-x-2'">
                                            <div class="w-full form-mb">
                                                <label class="form-label">Takaran</label>
                                                <select x-model="form.dosingType" class="form-input">
                                                    <option value="">masukkan takaran</option>
                                                    <template x-for="dosingType in dosingTypes">
                                                    <option :value="dosingType" x-text="dosingType"></option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div class="w-full form-mb">
                                                <div class="flex items-center space-x-2">
                                                    <div class="flex-1">
                                                        <label class="form-label">Botol</label>
                                                        <select x-model="form.bottle" class="form-input">
                                                            <option value="">masukkan ukuran botol</option>
                                                            <template x-for="bottle in bottles">
                                                            <option :value="bottle.bottle" x-text="bottle.bottle + ' ml'"></option>
                                                            </template>
                                                        </select>
                                                    </div>
                                                    <div x-show="formType == 'order'" class="flex-1" x-cloak>
                                                        <label class="form-label">Pilihan Harga</label>
                                                        <select x-model="form.selectedPrice" class="form-input">
                                                            <option value="">masukkan harga</option>
                                                            <template x-for="price in priceOptions">
                                                            <option :value="price" x-text="price"></option>
                                                            </template>
                                                            <option value="lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-mb">
                                            <div class="flex items-center space-x-2">
                                                <div class="basis-full lg:basis-1/2">
                                                    <label class="form-label">Parfum Dipilih</label>
                                                </div>
                                                <div class="basis-24 lg:basis-1/2">
                                                    <label class="form-label">Bibit</label>
                                                </div>
                                            </div>
                                            <div class="flex flex-col">
                                                <template x-for="(product, index) in form.products">
                                                    <div class="flex items-center space-x-2" :class="index != form.products.length - 1 && 'mb-2'">
                                                        <div class="basis-full lg:basis-1/2">
                                                            <input type="text" class="form-input" placeholder="masukkan nama toko" :value="product.name" disabled>
                                                        </div>
                                                        <div x-show="form.products.length" class="basis-24 lg:basis-1/2">
                                                            <input type="number" x-model="product.seed" class="form-input" placeholder="masukkan jumlah botol">
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2 form-mb">
                                        <div x-show="formType == 'order'" class="flex-1" x-cloak>
                                            <label class="form-label">Harga</label>
                                            <input x-model="form.price" x-on:input="formatPrice($el)" type="text" class="form-input" placeholder="masukkan harga">
                                        </div>
                                        <div class="flex-1">
                                            <label class="form-label">Qty</label>
                                            <input x-model="form.qty" type="number" class="form-input" placeholder="masukkan berapa qty" min="1" :max="member.bonus ? member.bonus : ''">
                                        </div> 
                                    </div>
                                    <div x-show="formType == 'order'" x-cloak>
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
                                        <button type="submit" class="flex-1 sm:flex-none bg-gray-800 text-white font-bold rounded-lg border border-gray-800 px-4 py-1.5 cursor-pointer" x-text="formType == 'order' ? 'Order' : 'Simpan'"></button>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <section name="order-list" class="basis-2/5 bg-white h-full lg:rounded-xl p-4 lg:p-8">
                <div class="flex items-center justify-between mb-5">
                    <div class="section-title mb-0">Orderan</div>
                    <div class="flex items-center space-x-2"> 
                        <button x-show="showBonusButton" x-on:click="formType = 'bonus'; openOrderModal = true" type="button" class="hover:bg-gray-200 font-bold rounded-lg border border-gray-400 px-3 py-1 cursor-pointer" x-cloak>Bonus</button>
                        <button x-show="member.bonus || window.innerWidth < 1024" x-on:click="formType = 'order'; openOrderModal = true" type="button" class="hover:bg-gray-200 font-bold rounded-lg border border-gray-400 px-3 py-1 cursor-pointer">Order</button>
                    </div>
                </div>
                <div x-show="orders.length" x-cloak>
                    <div class="mb-5">
                        <h6 class="font-semibold text-gray-600 mb-2">Orderan</h6>
                        <div class="flex flex-col space-y-2">
                            <template x-for="(order, index) in orders">
                            <div class="border-b border-gray-200 pb-2 mb-2">
                                <h6 class="font-semibold">
                                    <template x-for="(product, i) in order.products">
                                        <span>
                                            <span x-text="product.name"></span>
                                            <span x-show="order.bottle" class="text-gray-600" x-text="'(' + product.seed + ')'"></span><span x-show="i != order.products.length - 1">,</span>
                                        </span>
                                    </template>
                                    <span x-show="order.bottle">
                                        <span x-text="'&middot; ' + order.bottle + 'ml'"></span>
                                        <span class="text-gray-600" x-text="'(' + order.dosingType + ')'"></span>
                                    </span>
                                </h6>
                                <div class="flex items-center justify-between mt-3">
                                    <h6 class="font-semibold" x-text="formatedPrice(order.price * order.qty)"></h6>
                                    <div class="flex items-center">
                                        <button type="button" x-on:click="decrement(index)" class="hover:bg-gray-200 border border-gray-300 p-0.5 rounded-md focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div class="font-semibold mx-3" x-text="order.qty"></div>
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
                    <div x-show="bonuses.length" class="mb-5" x-cloak>
                        <h6 class="font-semibold text-gray-600 mb-2">Bonus Orderan</h6>
                        <div class="flex flex-col space-y-2">
                            <template x-for="(bonus, index) in bonuses">
                            <div class="border-b border-gray-200 pb-2 mb-2">
                                <div class="flex items-center justify-between">
                                    <h6 class="font-semibold">
                                        <template x-for="(product, i) in bonus.products">
                                            <span>
                                                <span x-text="product.name"></span>
                                                <span x-show="bonus.bottle" class="text-gray-600" x-text="'(' + product.seed + ')'"></span><span x-show="i != bonus.products.length - 1">,</span>
                                            </span>
                                        </template>
                                        <span x-show="bonus.bottle">
                                            <span x-text="'&middot; ' + bonus.bottle + 'ml'"></span>
                                            <span class="text-gray-600" x-text="'(' + bonus.dosingType + ')'"></span>
                                        </span>
                                    </h6>
                                    <div class="flex items-center">
                                        <button type="button" x-on:click="decrementBonus(index)" class="hover:bg-gray-200 border border-gray-300 p-0.5 rounded-md focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                        <div class="font-semibold mx-3" x-text="bonus.qty"></div>
                                        <button type="button" x-on:click="incrementBonus(index)" class="hover:bg-gray-200 border border-gray-300 p-0.5 rounded-md focus:outline-none">
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
                            <div class="relative mb-1">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="font-medium text-gray-600">Rp</span>
                                </div>
                                <input x-model="member.cash" type="text" x-on:keyup="formatPrice($el)" class="form-input pl-8" placeholder="masukkan uang customer">
                            </div>
                            <div x-show="validateMessage.cash" class="font-medium text-red-600 form-mb" x-text="validateMessage.cash" x-cloak></div>
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
                        <section name="order-approval" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-medium">
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
                        <section name="successful" class="bg-white w-full lg:w-1/3 max-h-full overflow-y-auto rounded-xl px-4 pb-4 lg:p-8 font-medium">
                            <div class="sticky lg:relative top-0 lg:top-auto bg-white section-title pt-4 pb-2 lg:py-0 mb-4 z-50">Orderan <span x-text="result.name"></span> Berhasil</div>
                            <div x-show="result.name" class="flex items-center justify-between mb-1" x-cloak>
                                <div>Customer</div>
                                <div class="font-bold" x-text="result.name"></div>
                            </div>
                            <div class="flex items-center justify-between mb-1">
                                <div>Uang customer</div>
                                <div class="font-bold" x-text="formatedPrice(result.cash)"></div>
                            </div>
                            <div class="flex items-center justify-between mb-2">
                                <div>Total</div>
                                <div class="font-bold" x-text="formatedPrice(result.total)"></div>
                            </div>
                            <div class="flex items-center justify-between border-t border-gray-200 pt-1">
                                <div x-text="result.change < 0 ? 'Hutang' : 'Kembalian'"></div>
                                <div class="font-bold" x-text="formatedPrice(result.change)"></div>
                            </div>
                            <div class="flex items-center justify-end space-x-2" :class="openSearchProduct ? 'mt-32' : 'mt-8'">
                                <a href="{{ route('order.retail') }}" class="flex-1 sm:flex-none">
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
    </div>
 
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('retail', () => ({
                outlet: @entangle('target_outlet'),
                bottles: @js($bottles),
                dosingTypes: ['Murni', 'Campur', 'Mix'],
                merks: [],
                member: {
                    id: '',
                    name: '',
                    phone: '',
                    cash: '',
                    previousOrders: [],
                    bonus: 0
                },
                newMember: {
                    name: '',
                    phone: ''
                },

                formType: 'order',
                form: {
                    dosingType: '',
                    products: [],
                    bottle: '',
                    seed: '',
                    selectedPrice: '',
                    price: '',
                    qty: 1
                },
                validateMessage: {
                    member: '',
                    form: ''
                },
                orders: [],
                bonuses: [],
                result: '',

                openMemberModal: false,
                openOrderModal: false,
                openSearchMember: false,
                openSearchProduct: false,
                openOrderApprovalModal: false,
                openSuccessfulModal: false,
                openMemberCard: false,

                isProcessing: false,

                init() {
                    this.$watch('form.dosingType', (value) => {
                        if( value != 'Mix' && this.form.products.length > 1 ) this.form.products.pop()
                    })

                    this.$watch('form.selectedPrice', (value) => {
                        value == 'lainnya' ? this.form.price = '' : this.form.price = value
                    })

                    this.$watch('form.bottle', (value) => {
                        if( this.form.dosingType == 'Murni' ) this.form.products[0].seed = value
                    })

                    this.$watch('orders', (value) => {
                        if( this.member.name ) {
                            let total = 0
                            this.orders.forEach(order => {
                                if( order.products[0].subcategory == 'Parfum Refill' && order.price >= 50000 ) total = total + parseInt(order.qty)
                            })

                            if( this.member.previousOrders.length ) total = total + this.member.previousOrders.slice(-1)[0].length
                            this.member.bonus = parseInt(total / 5)
                        } 
                    })

                    this.$watch('member.bonus', (value) => {
                        if( value == 0 ) {
                            this.bonuses = []
                            this.formType = 'order'
                        }
                    })
                },

                get formatedTotal() {
                    let total = 0
                    if( this.form.price ) total = new Intl.NumberFormat("id-ID").format(this.form.price.replace(/\./g, '') * this.form.qty)

                    return total
                },

                get totalOrderPrice() {
                    let total = 0
                    this.orders.forEach((order) => {
                        total = total + (order.price * order.qty)
                    })
                    return new Intl.NumberFormat("id-ID").format(total)
                },

                get showBonusButton() {
                    let total = 0
                    this.bonuses.forEach(bonus => {
                        total = total + bonus.qty
                    })

                    return this.member.bonus && total < this.member.bonus
                },

                formatedPrice(price) {
                    return 'Rp' + new Intl.NumberFormat('id-ID').format(price)
                },

                formatPrice(e) {
                    e.value = new Intl.NumberFormat("id-ID").format(e.value.replace(/\./g, ''))
                },

                resetSearchMember() {
                    this.openSearchMember = false
                    this.$refs.searchMember.value = ''
                    this.$wire.set('search_member', '')
                },

                cancelSelectMember() {
                    this.openMemberModal = false
                    this.openSearchMember = false
                    this.newMember.id = ''
                    this.newMember.name = ''
                }, 

                getMember(member) {
                    this.member.id = member.id
                    this.member.name = member.name
                    this.member.phone = member.phone
                    this.resetNewMemberForm()
                    this.openSearchMember = false
                    this.$wire.getMemberOrders(member.id).then((orders) => {
                        this.member.previousOrders = orders
                    })
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
                    this.member.previousOrders = []
                    this.member.bonus = 0
                    this.resetNewMemberForm()
                },

                cancelMakeOrder() {
                    this.openOrderModal = false
                    this.resetOrderForm()
                    this.openSearchProduct = false
                    this.validateMessage.form = ''
                },

                resetOrderForm() {
                    this.form.dosingType = '',
                    this.form.products = [],
                    this.form.bottle = '',
                    this.form.seed = '',
                    this.form.price = '',
                    this.form.qty = 1
                },

                resetSearchProduct() {
                    this.openSearchProduct = false
                    this.$refs.searchProduct.value = ''
                    this.$wire.set('search_product', '')
                },

                removeProduct(index) {
                    this.form.products.splice(index, 1)
                },

                get priceOptions() {
                    if( this.form.bottle ) {
                        const selectedBottle = this.bottles.find(bottle => {
                            return bottle.bottle == this.form.bottle
                        })
                        
                        const prices = selectedBottle.prices.split(', ')
                        return prices.map(price => {
                            return new Intl.NumberFormat("id-ID").format(price)
                        })
                    }
                },

                getProduct(target) {
                    const isExist = this.form.products.some(product => {
                        return product.id == target.id
                    })

                    if( !isExist ) {
                        const differentSubCat = this.form.products.some(product => {
                            return product.subcategory != target.subcategory.name
                        })

                        if( this.form.dosingType != 'Mix' ) this.form.products = []
                        if( differentSubCat ) {
                            this.resetOrderForm()
                        }

                        this.form.products.push({ 
                            id: target.id, 
                            name: target.name, 
                            subcategory: target.subcategory.name
                        })
                        this.form.price = new Intl.NumberFormat("id-ID").format(target.price)
                    }

                    this.resetSearchProduct()
                },

                storeToOrder() {
                    if( !this.form.products.length ) {
                        this.validateMessage.form = 'Form tidak boleh ada yang kosong'
                    } else {
                        let totalSeed = 0
                        this.form.products.forEach((product) => {
                            totalSeed = totalSeed + parseInt(product.seed)
                        })

                        const price = this.form.price.replace(/\./g, '')

                        if( this.formType == 'bonus' ) {
                            this.bonuses.push({ products: this.form.products, dosingType: this.form.dosingType, bottle: this.form.bottle, seed: totalSeed, qty: this.form.qty })
                            this.formType = 'order'
                        } else {
                            this.orders.push({ products: this.form.products, dosingType: this.form.dosingType, bottle: this.form.bottle, seed: totalSeed, price: price, qty: this.form.qty })
                        }

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

                incrementBonus(index) {
                    let total = 0
                    this.bonuses.forEach(bonus => {
                        total = total + bonus.qty
                    })

                    if( total < this.member.bonus ) this.bonuses[index].qty++
                },

                decrementBonus(index) {
                    this.bonuses[index].qty--
                    if( this.bonuses[index].qty == 0 ) this.bonuses.splice(index, 1)
                },

                cancelOrderPayment() {
                    this.orders = []
                    this.member.id = ''
                    this.member.name = ''
                    this.member.phone = ''
                    this.member.cash = ''
                },

                approveOrder() {
                    const change = this.member.cash.replace(/\./g, '') - this.totalOrderPrice.replace(/\./g, '')

                    if( !this.member.cash ) {
                        this.validateMessage.cash = 'Uang customer harus dimasukkan'
                        setTimeout(() => {
                            this.validateMessage.cash = ''
                        }, 2000);
                    } else if( change < 0 )  {
                        this.validateMessage.cash = 'Uang customer tidak mencukupi'
                        setTimeout(() => {
                            this.validateMessage.cash = ''
                        }, 2000);
                    } else {
                        this.openOrderApprovalModal = true
                    }
                },

                payOrder() {
                    this.isProcessing = true
                    this.$wire.order(this.orders, this.member, this.bonuses).then(result => { 
                        this.cancelOrderPayment()
                        this.isProcessing = false
                        this.openOrderApprovalModal = false
                        this.result = result
                        this.openSuccessfulModal = true
                    })
                }
            }))
        })
    </script>
</div>