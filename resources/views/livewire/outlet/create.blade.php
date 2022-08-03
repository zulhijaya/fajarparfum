<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        <div class="mb-6">
            <label class="form-label">Nama</label>
            <input wire:model.defer="name" type="text" class="form-input" placeholder="masukkan nama toko">
            @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="mb-6">
            <label class="form-label">Alamat</label>
            <textarea wire:model.defer="address" rows="3" class="form-input" placeholder="masukkan alamat lengkap toko"></textarea>
            @error('address') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="mb-6">
            <label class="form-label">Jenis Toko</label>
            <div class="flex items-center space-x-8">
                <label for="toko-utama" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="type" id="toko-utama" type="radio" name="type" value="toko utama" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Toko utama</span>
                </label>
                <label for="cabang" class="group flex items-center space-x-1 cursor-pointer">
                    <input wire:model="type" id="cabang" type="radio" name="type" value="cabang" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Cabang</span>
                </label>
            </div>
            @error('status') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="">
            <label class="form-label">Status</label>
            <div class="flex items-center space-x-8">
                <label for="buka" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="status" id="buka" type="radio" name="status" value="buka" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Buka</span>
                </label>
                <label for="tutup" class="group flex items-center space-x-1 cursor-pointer">
                    <input wire:model="status" id="tutup" type="radio" name="status" value="tutup" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Tutup</span>
                </label>
                <label for="berhenti" class="group flex items-center space-x-1 cursor-pointer">
                    <input wire:model="status" id="berhenti" type="radio" name="status" value="berhenti" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Berhenti</span>
                </label>
            </div>
            @error('status') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="outlet.index" parameter="" button="Tambah"></x-form-button>
    </form>
</div>