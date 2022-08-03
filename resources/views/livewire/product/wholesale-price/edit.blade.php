<div class="bg-white rounded-lg px-4 pt-4 pb-8 lg:p-8 min-h-full">
    <form wire:submit.prevent="update" class="font-medium">
        @for( $i = 0; $i < count($wholesale_price['size']); $i++ )
        <div class="form-mb">
            <label class="form-label">Harga {{ $wholesale_price['size'][$i] }}ml</label>
            <input wire:model.defer="wholesale_price.price.{{ $i }}" type="number" class="form-input" placeholder="masukkan harga grosir">
            @error('wholesale_price.price.' . $i) <div class="form-error">{{ $message }}</div> @enderror
        </div>
        @endfor

        <x-form-button route="product.wholesale-price.index" :parameter="$product->id" button="Update"></x-form-button>
    </form>
</div>