<div class="flex items-center justify-end space-x-2 mt-8">
    <a href="{{ route($route, $parameter) }}">
        <button type="button" class="form-cancel-button">Batal</button>
    </a>
    <button class="form-confirm-button">{{ $button }}</button>
</div>