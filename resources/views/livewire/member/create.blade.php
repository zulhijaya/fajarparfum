<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Nama :</label>
            <input wire:model.defer="name" type="text" class="form-input" placeholder="masukkan nama">
            @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Nomor Telepon :</label>
            <input wire:model.defer="phone" type="number" class="form-input" placeholder="masukkan nomor telepon">
            @error('phone') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="user.index" parameter="" button="Tambah"></x-form-button>
    </form>
</div>