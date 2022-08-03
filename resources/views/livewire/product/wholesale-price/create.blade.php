<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Nama</label>
            <select wire:model="merk_id" class="form-input">
                <option value="">masukkan nama merek</option>
                @foreach( $merks as $merk )
                <option value="{{ $merk->id }}">{{ $merk->name }}</option>
                @endforeach
            </select>
            @error('merk_id') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="flex items-center space-x-2 form-mb">
            <div class="flex-1">
                <label class="form-label">Jumlah</label>
                <input wire:model.defer="amount" type="text" class="form-input" placeholder="masukkan jumlahnya">
                @error('amount') <div class="form-error">{{ $message }}</div> @enderror
            </div>
            <div class="flex-1">
                <label class="form-label">Satuan</label>
                <select wire:model.defer="unit" class="form-input">
                    <option value="">masukkan satuan</option>
                    <option value="ml">ml</option>
                    <option value="liter">liter</option>
                    <option value="botol">botol</option>
                    <option value="lusin">lusin</option>
                </select>
                @error('unit') <div class="form-error">{{ $message }}</div> @enderror
            </div>
        </div>
        <div>
            <label class="form-label">Harga</label>
            <input wire:model.defer="price" type="number" class="form-input" placeholder="masukkan harga grosir">
            @error('price') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="product.wholesale-price.index" :parameter="$product->id" button="Tambah"></x-form-button>
    </form>
</div>