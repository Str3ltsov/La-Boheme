<!--<h2 class="mt-0">Trenerio rezervacija</h2>
<div class="p-20 mt-40" style="background-color: #F6F7F3; border-radius: 10px;">
    <h4>1/4 Pasirinkite, kokio trenerio ieškote?</h4>
    <div class="chosen">
        <input type="radio" id="age1" name="age" value="30">
        <label for="age1">Vyr. trenerio</label>
    </div>
    <div class="chosen">
        <input type="radio" id="age2" name="age" value="60">
        <label for="age2">Vyr. trenerio asistento</label>
    </div>
    <div class="chosen">
        <input type="radio" id="age3" name="age" value="100">
        <label for="age3">Fizinio rengimo trenerio</label>
    </div>
    <hr>
    <a class="btn btn-theme-colored btn-flat" href="#">Toliau</a>
</div>-->


@forelse ($reservationTypes ?? [] as $reservationType)
    <div class="chosen">
        <label class="m-0 ml-5">
            <input
                wire:model.lazy="reservation_type"
                class="form-check-input mr-10"
                type="radio"
                name="reservation_type"
                id="reservation_type"
                value="{{ $reservationType->id }}"
{{--                onclick="fetchUnavailableDates({{ $reservationType->id }})"--}}
            >
            {{ __($reservationType->name) }}
        </label>
    </div>
    @error('reservation_type')
        <span class="text-danger fs-5">{{ $message }}</span>
    @enderror
        @empty
        <div class="form-control d-flex flex-column justify-content-center align-items-center">
            <p>{{ __('No reservation types found') }}</p>
        </div>
@endforelse
{{--<div class="mt-10 mb-20">--}}
{{--    <input--}}
{{--        wire:model="date" type="text"--}}
{{--        class="form-control datepicker fs-4 text-light bg-transparent text-center py-2 input-hover-focus fade-in"--}}
{{--        style="width: 300px; border-radius: 5px;"--}}
{{--        autocomplete="off"--}}
{{--        data-provide="datepicker" data-date-autoclose="true"--}}
{{--        data-date-format="yyyy/mm/dd" data-date-today-highlight="true"--}}
{{--        id="date_picker" placeholder="{{ __('Pasirinkite datą') }}"--}}
{{--        onchange="this.dispatchEvent(new InputEvent('input'))"--}}
{{--        onkeydown="return false"--}}
{{--        readonly--}}
{{--    >--}}
{{--    @error('date')--}}
{{--        <span class="text-danger fs-5">{{ $message }}</span>--}}
{{--    @enderror--}}
{{--</div>--}}
<div>
    <button wire:click="goToNextStep" type="button" class="mt-15" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 150px">
        {{ __('Next') }}
    </button>
</div>
