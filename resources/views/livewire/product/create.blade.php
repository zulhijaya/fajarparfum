<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Kategori</label>
            <select wire:model="subcategory_id" class="form-input">
                <option value="">masukkan jenis parfum</option>
                @foreach( $subcategories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('subcategory_id') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Nama</label>
            <input wire:model.defer="name" type="text" class="form-input" placeholder="masukkan nama">
            @error('name') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @if( $this->category_id == 1 )
        <div class="form-mb">
            <label class="form-label">Nama Lain</label>
            <input wire:model.defer="other_name" type="text" class="form-input" placeholder="masukkan nama lain">
        </div>
        <div class="form-mb">
            <label class="form-label">Penanda</label>
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                @foreach( $tags as $tag )
                <label for="{{ $tag->name }}" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="tag_ids" id="{{ $tag->name }}" type="checkbox" value="{{ $tag->id }}" class="flex-shrink-0 w-4 h-4  accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">{{ $tag->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @endif
        @if( $subcategory_id && $subcategory_id != 1 )
        <div>
            <label class="form-label">Harga</label>
            <input wire:model.defer="price" type="number" class="form-input" placeholder="masukkan harga">
            @error('price') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @endif

        <x-form-button route="product.index" parameter="" button="Tambah"></x-form-button>
    </form>
</div>