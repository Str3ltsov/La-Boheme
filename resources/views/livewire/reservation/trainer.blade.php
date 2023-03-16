<label for="coach" class="d-flex align-items-center col-sm-6 mt-10 mb-10" style="gap: 15px">
    <div class="d-flex">
        <input
            wire:model.lazy="coach"
            class="form-check-input"
            type="radio"
            name="trainer"
            id="trainer"
            value="{{ $coach->id }}"
            @if (!$coach->available)
                disabled
            @endif
        >
        @if ($coach->avatar)
            <img
                src="{{ $coach->avatar }}"
                alt="{{ $coach->first_name.' '.$coach->last_name }}"
                class="ml-10 mr-10"
                @if ($coach->available)
                    style="width: 90px; border-radius: 50px"
                @else
                    style="width: 90px; border-radius: 50px; filter: grayscale(100%)"
                @endif
            >
        @else
            <img
                src="{{ asset('images/avatars/no_avatar.png') }}"
                alt="{{ $coach->first_name.' '.$coach->last_name }}"
                class="ml-10 mr-10"
                @if ($coach->available)
                    style="width: 90px; border-radius: 50px"
                @else
                    style="width: 90px; border-radius: 50px; filter: grayscale(100%)"
                @endif
            >
        @endif
        @if ($coach->available)
            <label class="text-dark">{{ $coach->first_name.' '.$coach->last_name }}</label>
        @else
            <label class="text-muted">{{ $coach->first_name.' '.$coach->last_name.' '.__('(užimtas)') }}</label>
        @endif
    </div>
    @error('trainer')
        <span class="text-danger mt-10 ml-30">{{ $message }}</span>
    @enderror
</label>
