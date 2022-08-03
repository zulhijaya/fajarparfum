<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Ukuran Botol <span class="text-gray-600">(ml)</span></label>
            <input wire:model.defer="bottle" type="number" class="form-input" placeholder="masukkan ukuran botol">
            @error('bottle') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="form-label">Harga <span class="text-gray-600">(pisahkan dengan tanda (,))</span></label>
            <input wire:model.defer="prices" type="text" class="form-input" placeholder="masukkan semua harga">
            @error('prices') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="refill-price.index" parameter="" button="Tambah"></x-form-button>
    </form>
</div>