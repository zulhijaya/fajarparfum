<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Kategori</label>
            <select wire:model="category_id" class="form-input">
                <option value="">masukkan kategori</option>
                @foreach( $categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div>
            <label class="form-label">Nama :</label>
            <input wire:model.defer="name" type="text" class="form-input" placeholder="masukkan nama kategori">
            @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>

        <x-form-button route="subcategory.index" parameter="" button="Tambah"></x-form-button>
    </form>
</div>