<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div class="mb-6">
            <label class="form-label">Nama :</label>
            <input wire:model.defer="outlet.name" type="text" class="form-input" placeholder="masukkan nama toko">
            @error('outlet.name') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="mb-6">
            <label class="form-label">Alamat :</label>
            <textarea wire:model.defer="outlet.address" rows="3" class="form-input" placeholder="masukkan alamat lengkap toko"></textarea>
            @error('outlet.address') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @if( $outlets_count > 1 )
        <div class="mb-6">
            <label class="form-label">Jenis Toko :</label>
            <div class="flex items-center space-x-8">
                <label for="toko-utama" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="outlet.type" id="toko-utama" type="radio" name="type" value="toko utama" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Toko utama</span>
                </label>
                <label for="cabang" class="group flex items-center space-x-1 cursor-pointer">
                    <input wire:model="outlet.type" id="cabang" type="radio" name="type" value="cabang" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Cabang</span>
                </label>
            </div>
            @error('outlet.type') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @endif
        <div class="">
            <label class="form-label">Status :</label>
            <div class="flex items-center space-x-8">
                <label for="buka" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="outlet.status" id="buka" type="radio" name="status" value="buka" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Buka</span>
                </label>
                <label for="tutup" class="group flex items-center space-x-1 cursor-pointer">
                    <input wire:model="outlet.status" id="tutup" type="radio" name="status" value="tutup" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Tutup</span>
                </label>
                <label for="berhenti" class="group flex items-center space-x-1 cursor-pointer">
                    <input wire:model="outlet.status" id="berhenti" type="radio" name="status" value="berhenti" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Berhenti</span>
                </label>
            </div>
            @error('outlet.status') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="outlet.index" parameter="" button="Update"></x-form-button>
    </form>
</div>