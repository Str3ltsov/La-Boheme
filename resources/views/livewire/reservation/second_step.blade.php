<div class="d-flex flex-column justify-content-center align-items-center my-3 text-light fade-in" style="gap: 10px">
    <div class="d-flex flex-column justify-content-center align-items-center w-100 p-2">
        <select wire:model.lazy="time_from" class="form-select fs-4 bg-transparent input-hover-focus text-light py-2 ps-3 fade-in" name="time_from" style="border-radius: 5px; width: clamp(300px, 100%, 400px)"
                {{--onchange="showTimeToSelector()"--}}
                wire:change="setAndGetEndTimes">
            <option value="" selected style="color: black;">{{ __('Rezervuoti nuo') }}</option>
            @forelse ($startTimes ?? [] as $time)
                <option value="{{ $time }}" style="color: black;">{{ $time }}</option>
            @empty
                <option value="" disabled style="color: black;">{{ __('Nerasta laikų') }}</option>
            @endforelse
        </select>
        @error('time_from')
            <span class="text-danger fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center w-100 p-2">
        <select wire:model.lazy="time_to" class="form-select fs-4 bg-transparent input-hover-focus text-light py-2 ps-3 fade-in" name="time_to" id="time_to_selector" style="border-radius: 5px; width: clamp(300px, 100%, 400px)">
            <option value="" selected style="color: black;">{{ __('Rezervuoti iki') }}</option>
            @forelse ($endTimes ?? [] as $time)
                <option value="{{ $time }}" style="color: black;">{{ $time }}</option>
            @empty
                <option value="" disabled style="color: black;">{{ __('Nerasta laikų') }}</option>
            @endforelse
        </select>
        @error('time_to')
        <span class="text-danger fs-5 fade-in">{{ $message }}</span>
        @enderror
    </div>
{{--    <div class="d-flex flex-column justify-content-center align-items-center w-100 p-2">--}}
{{--        <input--}}
{{--            wire:model.lazy="number_of_people" type="number"--}}
{{--            @if ($reservation_type == \App\Helpers\Constants::reservationTypeVyrtren)--}}
{{--                min="1"--}}
{{--                max="8"--}}
{{--            @else--}}
{{--                min="9"--}}
{{--            @endif--}}
{{--            class="form-control fs-4 bg-transparent text-light py-2 ps-3 input-hover-focus"--}}
{{--            name="number_of_people" style="border-radius: 5px; min-width: 300px; max-width: 400px;"--}}
{{--            placeholder="{{ __('Žmonių skaičius') }}"--}}
{{--            oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"--}}
{{--        >--}}
{{--        @error('number_of_people')--}}
{{--            <span class="text-danger fs-5 fade-in">{{ $message }}</span>--}}
{{--        @enderror--}}
{{--    </div>--}}
    <div class="d-flex justify-content-end mt-2 mt-md-4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>

<script>
    /*$(() => {
        $('#time_to_selector').hide();
    });

    function showTimeToSelector() {
        $('select[name="time_from"] option').each(function() {
            if ($(this).is(':selected')) $('#time_to_selector').show();
        });
    }*/
</script>
