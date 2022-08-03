<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="add" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Stok Sekarang :</label>
            <input wire:model.defer="current_stock" type="number" class="form-input" placeholder="masukkan stok" disabled>
            @error('current_stock') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="form-label">Stok Tambahan :</label>
            <input wire:model.defer="stock" type="number" class="form-input" placeholder="masukkan stok yang mau ditambah">
            @error('stock') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="outlet.stock.index" :parameter="$outlet" button="Tambah"></x-form-button>
    </form>
</div>