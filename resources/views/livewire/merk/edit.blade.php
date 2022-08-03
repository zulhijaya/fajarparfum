<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div>
            <label class="form-label">Nama :</label>
            <input wire:model.defer="merk.name" type="text" class="form-input" placeholder="masukkan nama merek">
            @error('merk.name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="merk.index" parameter="" button="Update"></x-form-button>
    </form>
</div>