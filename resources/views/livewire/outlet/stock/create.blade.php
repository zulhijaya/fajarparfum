<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="store" class="font-medium">
        @foreach( $products as $index => $category )
        <div class="@if( !$loop->last ) mb-8 @endif">
            <div class="flex items-center justify-between">
                <label for="" class="form-label mb-2">{{ $index }}</label>
                <label for="select-all" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="selectAll" id="select-all" type="checkbox" class="flex-shrink-0 w-4 h-4  accent-blue-500 cursor-pointer focus:outline-none" checked>
                    <span class="truncate">Pilih semua</span>
                </label>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-4">
                @foreach( $category as $product )
                <label for="{{ $product->name }}" class="group flex items-center space-x-2 cursor-pointer">
                    <input wire:model="product_ids" id="{{ $product->name }}" type="checkbox" value="{{ $product->id }}" class="target flex-shrink-0 w-4 h-4  accent-blue-500 cursor-pointer focus:outline-none">
                    <span class="truncate">{{ $product->name }} @if( $product->size ) ({{ $product->size }}) @endif</span>
                </label>
                @endforeach
            </div>
        </div>
        @endforeach
        @error('product_ids') <div class="form-error mt-6">{{ $message }}</div> @enderror

        <x-form-button route="outlet.stock.index" :parameter="$outlet->id" button="Tambah"></x-form-button>
    </form>
</div>