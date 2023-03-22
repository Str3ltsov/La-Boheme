<div class="d-flex align-items-center col-sm-6 mt-10 mb-10" style="gap: 15px">
    <div style="display: flex; align-items: center; gap: 10px">
        <input
            wire:model.lazy="coach"
            class="form-check-input"
            type="radio"
            name="coach"
            id="coach"
            value="{{ $coach->id }}"
            @if (!$coach->available)
                disabled
            @endif
        >
        @if ($coach->avatar)
            <label for="coach">
                <img
                    src="{{ $coach->avatar }}"
                    alt="{{ $coach->first_name.' '.$coach->last_name }}"
                    class="ml-10 mr-10"
                    @if ($coach->available)
                        style="width: 100px; height: 100px; border-radius: 50px; object-fit: cover"
                    @else
                        style="width: 100px; height: 100px; border-radius: 50px; object-fit: cover; filter: grayscale(100%)"
                    @endif
                >
            </label>
        @else
            <label for="coach">
                <img
                    src="{{ asset('images/avatars/no_avatar.png') }}"
                    alt="{{ $coach->first_name.' '.$coach->last_name }}"
                    class="ml-10 mr-10"
                    @if ($coach->available)
                        style="width: 100px; height: 100px; border-radius: 50px; object-fit: cover"
                    @else
                        style="width: 100px; height: 100px; border-radius: 50px; object-fit: cover; filter: grayscale(100%)"
                    @endif
                >
            </label>
        @endif
        <div style="display: flex; flex-direction: column">
            @if ($coach->available)
                <span class="text-dark">{{ $coach->first_name.' '.$coach->last_name }}</span>
            @else
                <span class="text-muted">{{ $coach->first_name.' '.$coach->last_name.' '.__('(busy)') }}</span>
            @endif
            @if ($coach->cv)
                <a href="{{ asset($coach->cv) }}" class="text-danger" download>
                    <u>{{ __('Download coach CV') }}</u>
                </a>
            @endif
        </div>
    </div>
    @error('coach')
        <span class="text-danger mt-10 ml-30">{{ $message }}</span>
    @enderror
</div>
