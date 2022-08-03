<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Nama :</label>
            <input wire:model.defer="user.name" type="text" class="form-input" placeholder="masukkan nama">
            @error('user.name') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Nomor Telepon :</label>
            <input wire:model.defer="user.phone" type="number" class="form-input" placeholder="masukkan nomor telepon">
            @error('user.phone') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Email :</label>
            <input wire:model.defer="user.email" type="email" class="form-input" placeholder="masukkan email">
            @error('user.email') <div class="form-error">{{ $message }}</div> @enderror
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
        @if( $old_role != 'admin' )
        <div class="form-mb">
            <label class="form-label">Role :</label>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-y-2">
                <label for="admin" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="user.role" id="admin" type="radio" name="type" value="admin" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Admin</span>
                </label>
                <label for="owner" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="user.role" id="owner" type="radio" name="type" value="owner" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Owner</span>
                </label>
                <label for="manager" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="user.role" id="manager" type="radio" name="type" value="manager" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Manager</span>
                </label>
                <label for="employee" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="user.role" id="employee" type="radio" name="type" value="employee" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Employee</span>
                </label>
            </div>
            @error('user.role') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @endif
        <div class="form-mb">
            <label class="form-label">Tempat Kerja :</label>
            <div class="flex flex-col space-y-2">
                @foreach( $outlets as $outlet )
                <label for="{{ $outlet->name }}" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="outlet_ids" id="{{ $outlet->name }}" type="checkbox" name="outlet" value="{{ $outlet->id }}" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">{{ $outlet->name }} <span class="text-gray-600 capitalize">({{ $outlet->type }})</span></span>
                </label>
                @endforeach
            </div>
            @error('outlet_ids') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @if( $user->role == 'employee' )
        <div class="form-mb">
            <label class="form-label">Jam Kerja :</label>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-y-1">
                <label for="full-time" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="user.working_hours" id="full-time" type="radio" name="working-hours" value="full-time" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Full-Time</span>
                </label>
                <label for="part-time" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="user.working_hours" id="part-time" type="radio" name="working-hours" value="part-time" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Part-time</span>
                </label>
            </div>
            @error('user.working_hours') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="form-label">Status :</label>
            <div class="grid grid-cols-2 lg:grid-cols-12 gap-y-1">
                <label for="bekerja" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="user.status" id="bekerja" type="radio" name="status" value="bekerja" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Bekerja</span>
                </label>
                <label for="berhenti" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="user.status" id="berhenti" type="radio" name="status" value="berhenti" class="w-3.5 h-3.5 accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">Berhenti</span>
                </label>
            </div>
            @error('user.status') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @endif

        <x-form-button route="user.index" parameter="" button="Update"></x-form-button>
    </form>
</div>