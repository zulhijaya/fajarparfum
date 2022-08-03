<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        <div class="form-mb">
            <label class="form-label">Nama</label>
            <input wire:model.defer="product.name" type="text" class="form-input" placeholder="masukkan nama parfum">
            @error('product.name') <div class="form-error">{{ $message }}</div> @enderror
        </div>
        <div class="form-mb">
            <label class="form-label">Nama Lain {{ $product->category_id }}</label>
            <input wire:model.defer="product.other_name" type="text" class="form-input" placeholder="masukkan nama lain parfum">
        </div>
        @if( $product->subcategory->category_id == 1 )
        <div class="form-mb">
            <label class="form-label">Penanda</label>
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                @foreach( $tags as $tag )
                <label for="{{ $tag->name }}" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model.defer="tag_ids" id="{{ $tag->name }}" type="checkbox" value="{{ $tag->id }}" class="flex-shrink-0 w-4 h-4  accent-blue-500 cursor-pointer focus:outline-none" @if( in_array($tag->id, $tag_ids) ) checked @endif>
                    <span class="truncate">{{ $tag->name }}</span>
                </label>
                @endforeach
            </div>
        </div>
        @endif
        @if( $product->subcategory_id != 1 )
        <div>
            <label class="form-label">Harga</label>
            <input wire:model.defer="product.price" type="number" class="form-input" placeholder="masukkan harga">
        </div>
        @endif

        <x-form-button route="product.index" parameter="" button="Update"></x-form-button>
    </form>
</div>