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
        <div class="form-mb">
            <label class="form-label">Email :</label>
            <input wire:model.defer="email" type="email" class="form-input" placeholder="masukkan email">
            @error('email') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Password :</label>
            <input wire:model.defer="password" type="password" class="form-input" placeholder="masukkan password">
            @error('password') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Konfirmasi Password :</label>
            <input wire:model.defer="password_confirmation" type="password" class="form-input" placeholder="masukkan konfirmasi password">
        </div>
        <div class="form-mb">
            <label class="form-label">Role :</label>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-y-2">
                <label for="admin" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="role" id="admin" type="radio" name="type" value="admin" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Admin</span>
                </label>
                <label for="owner" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="role" id="owner" type="radio" name="type" value="owner" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Owner</span>
                </label>
                <label for="manager" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="role" id="manager" type="radio" name="type" value="manager" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Manager</span>
                </label>
                <label for="employee" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="role" id="employee" type="radio" name="type" value="employee" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Employee</span>
                </label>
            </div>
            @error('role') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Tempat Kerja :</label>
            <div class="flex flex-col space-y-2">
                @foreach( $outlets as $outlet )
                <label for="{{ $outlet->name }}" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="outlet_ids" id="{{ $outlet->name }}" type="checkbox" name="outlet" value="{{ $outlet->id }}" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">{{ $outlet->name }} <span class="text-gray-600 capitalize">({{ $outlet->type }})</span></span>
                </label>
                @endforeach
            </div>
            @error('outlet_ids') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @if( $role == 'employee' )
        <div>
            <label class="form-label">Jam Kerja :</label>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-y-1">
                <label for="full-time" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="working_hours" id="full-time" type="radio" name="working-hours" value="full-time" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Full-Time</span>
                </label>
                <label for="part-time" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="working_hours" id="part-time" type="radio" name="working-hours" value="part-time" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Part-time</span>
                </label>
            </div>
            @error('working_hours') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @endif

        <x-form-button route="user.index" parameter="" button="Tambah"></x-form-button>
    </form>
</div>