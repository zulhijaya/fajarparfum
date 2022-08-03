<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div>
            <label class="form-label">Nama :</label>
            <input wire:model.defer="category.name" type="text" class="form-input" placeholder="masukkan nama kategori">
            @error('category.name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="category.index" parameter="" button="Update"></x-form-button>
    </form>
</div>