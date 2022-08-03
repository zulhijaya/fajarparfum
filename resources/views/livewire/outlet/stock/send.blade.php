<div x-data="send">
    <div class="lg:flex items-start lg:space-x-4">
        <div x-show="openModal || window.innerWidth > 1024" class="basis-full fixed lg:relative inset-0 lg:inset-auto bg-black lg:bg-transparent bg-opacity-30 lg:bg-opacity-0 z-40" x-cloak="mobile">
            <div class="flex items-center w-full h-full p-4 lg:p-0">
                <section name="send" x-on:click.outside="cancelSelectProduct" class="basis-full bg-white rounded-xl p-4 lg:p-8">
                    <div class="section-title">Pilih Barang</div>
                    <form x-on:submit.prevent="sendToList" class="font-medium">
                        <div x-show="errorMessage" class="font-medium text-red-600 form-mb" x-text="errorMessage" x-cloak></div>
                        <div class="form-mb">
                            <label class="form-label">Kirim ke</label>
                            <select wire:model="outlet_id" x-model="targetOutlet" class="form-input">
                                <option value="">masukkan toko tujuan</option>
                                @foreach( $outlets as $target )
                                <option value="{{ $target->id }}">{{ $target->name }}</option>
                                @endforeach
                            </select>
                            @error('outlet_id') <div class="form-error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-mb">
                            <label class="form-label">Pencarian</label>
                            <div x-on:click.outside="openSearch = false" class="relative">
                                <input 
                                    wire:model.debounce="search" 
                                    x-on:focusin="openSearch = true" x-ref="search" 
                                    type="text" class="w-full px-4 py-1.5 font-medium rounded-lg focus:outline-none border border-gray-300 focus:border-gray-800 focus:ring-0 focus:ring-gray-800 placeholder-gray-400" placeholder="masukkan nama parfum atau botol"
                                >
                                <div x-show="openSearch" class="absolute mt-0.5 inset-x-0 z-50" x-cloak>
                                    <div wire:loading.remove wire:target="search" class="bg-white border shadow-lg rounded-b-lg max-h-64 overflow-y-auto">
                                        @foreach( $products as $index => $category )
                                            <div class="sticky top-0 bg-white px-4 pt-4 pb-2">
                                                <h6 class="font-extrabold">{{ $index }}</h6>
                                            </div>
                                            @foreach( $category as $product )
                                            <div 
                                                x-on:click="getProduct({{ $product }})" 
                                                class="flex items-center justify-between font-medium hover:bg-gray-200 px-4 py-2 cursor-pointer"
                                            >
                                                <div>{{ $product->name }}</div>
                                                @if( $product->subcategory->category->name == 'Parfum' ) <div>{{ $product->pivot->stock }}ml</div> @endif
                                            </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div wire:loading.block wire:target="search" class="bg-white border shadow-lg rounded-b-lg py-2">
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
                            <div x-show="form.product.id" class="flex flex-wrap items-center mt-1" x-cloak>
                                <div class="flex items-center space-x-1 rounded-full border border-gray-300 px-3 py-1 mb-1">
                                    <div class="font-medium" x-text="form.product.name"></div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <div class="flex-1">
                                <label class="form-label">Qty</label>
                                <input x-model="form.qty" type="number" class="form-input" placeholder="masukkan jumlah">
                            </div>
                            <div class="flex-1">
                                <label class="form-label">Satuan</label>
                                <select x-model="form.unit" class="form-input">
                                    <option value="">masukkan satuan</option>
                                    <option value="ml">ml</option>
                                    <option value="botol">botol</option>
                                    <option value="lusin">lusin</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-end space-x-2" :class="openSearch ? 'mt-48' : 'mt-8'">
                            <button type="button" x-on:click="cancelSelectProduct" class="flex-1 sm:flex-none font-semibold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Batal</button>
                            <button type="submit" class="flex-1 sm:flex-none bg-gray-800 text-white font-semibold rounded-lg border px-4 py-1.5 cursor-pointer">Simpan</button>
                        </div>
                
                    </form>
                </section>
            </div>
        </div>
        <section name="send-list" class="basis-2/5 bg-white h-full lg:rounded-xl p-4 lg:p-8">
            <div class="flex items-center justify-between mb-5">
                <div class="section-title mb-0">Barang Kiriman</div>
                <button x-on:click="openModal = true" type="button" class="lg:hidden hover:bg-gray-200 font-bold rounded-lg border border-gray-200 px-3 py-1 cursor-pointer">Pilih</button>
            </div>
            <div x-show="sends.length" x-cloak>
                @if( $outlet_id )
                <div class="mb-5">
                    <h6 class="font-semibold text-gray-600 mb-2">Toko Tujuan</h6>
                    <div class="flex items-center justify-between">
                        <div class="font-semibold">{{ $this->outlet_name }}</div>
                    </div>
                </div>
                @endif
                <div>
                    <h6 class="font-semibold text-gray-600 mb-2">Barang</h6>
                    <div>
                        <template x-for="(send, index) in sortedSends">
                        <div class="border-b border-gray-200 pb-2 mb-2">
                            <div class="flex items-center justify-between">
                                <h6 class="font-semibold" x-text="send.product.name"></h6>
                                <div class="flex items-center">
                                    <button type="button" x-on:click="decrement(index)" class="hover:bg-gray-200 border border-gray-300 p-0.5 rounded-md focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <div class="font-medium mx-2" x-text="send.qty + (send.product.subcategory.name == 'Parfum Refill' ? '' : ' ') + send.unit"></div>
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
                <div class="flex items-center justify-end space-x-2 mt-8">
                    <button type="button" x-on:click="cancelSend" class="flex-1 sm:flex-none font-semibold hover:bg-gray-200 rounded-lg border border-gray-300 px-4 py-1.5 cursor-pointer">Batal</button>
                    <button type="button" x-on:click="send" class="flex-1 sm:flex-none bg-blue-600 text-white font-semibold rounded-lg border px-4 py-1.5 cursor-pointer">Kirim</button>
                </div>
            </div>
            <div x-show="!sends.length" class="font-medium">
                Belum ada barang yang dipilih
            </div>
        </section> 
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('send', () => ({
                targetOutlet: '',
                form: {
                    product: '',
                    qty: '',
                    unit: ''
                },
                sends: [],
                openModal: false,
                openSearch: false,
                errorMessage: '',

                getProduct(product) {
                    const isExist = this.sends.some(send => {
                        return send.product.id == product.id
                    })
                    
                    if( !isExist ) {
                        this.form.product = product
                    }
                    
                    this.openSearch = false
                    this.$refs.search.value = ''
                    this.$wire.set('search', '')
                },

                cancelSelectProduct() {
                    this.openModal = false,
                    this.openSearch = false,
                    this.form.product = ''
                    this.form.qty = ''
                    this.form.unit = ''
                    this.errorMessage = ''
                    this.$wire.set('search', '')
                },
                
                sendToList() {
                    if( this.targetOutlet && this.form.product && this.form.qty && this.form.unit ) {
                        if( this.form.product.pivot.stock >= this.form.qty ) {
                            this.sends.push({ product: this.form.product, qty: this.form.qty, unit: this.form.unit })
                            this.cancelSelectProduct()
                        } else {
                            this.errorMessage = 'Stok ' + this.form.product.name + ' tidak cukup untuk dikirim'
                        }
                    } else {
                        this.errorMessage = 'Form tidak boleh ada yang kosong'
                    }
                },

                increment(index) {
                    if( this.sends[index].product.subcategory.name != 'Parfum Refill' ) this.sends[index].qty++
                    else this.sends[index].qty = parseInt(this.sends[index].qty) + 50
                },

                decrement(index) {
                    if( this.sends[index].product.subcategory.name != 'Parfum Refill' ) this.sends[index].qty--
                    else this.sends[index].qty = parseInt(this.sends[index].qty) - 50

                    if( !this.sends[index].qty ) {
                        this.sends.splice(index, 1)
                    }
                    
                },

                cancelSend() {
                    this.targetOutlet = ''
                    this.sends = []
                },

                send() {
                    this.$wire.send(this.sends)
                },

                get sortedSends() {
                    function compare(a, b) {
                        if( a.product.subcategory_id < b.product.subcategory_id ) return -1
                        if ( a.product.subcategory_id > b.product.subcategory_id ) return 1
                        return 0;
                    }

                    return this.sends.sort(compare)
                }
            }))
        })
    </script>
</div>