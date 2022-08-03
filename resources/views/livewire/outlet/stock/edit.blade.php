<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div>
            <label class="form-label">Stok :</label>
            <input wire:model.defer="stock" type="number" class="form-input" placeholder="masukkan stok">
            @error('stock') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="outlet.stock.index" :parameter="$outlet" button="Update"></x-form-button>
    </form>
</div>