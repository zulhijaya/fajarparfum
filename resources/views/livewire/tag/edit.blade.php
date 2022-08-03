<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div>
            <label class="form-label">Nama :</label>
            <input wire:model.defer="tag.name" type="text" class="form-input" placeholder="masukkan nama penanda">
            @error('tag.name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="tag.index" parameter="" button="Update"></x-form-button>
    </form>
</div>