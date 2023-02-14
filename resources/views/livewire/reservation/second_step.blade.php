<div>
    <div>
        <select wire:model.lazy="time_from" class="form-select" name="time_from" style="border-radius: 5px; width: clamp(300px, 100%, 400px)"
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
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <select wire:model.lazy="time_to" class="form-select" name="time_to" id="time_to_selector" style="border-radius: 5px; width: clamp(300px, 100%, 400px)">
            <option value="" selected style="color: black;">{{ __('Rezervuoti iki') }}</option>
            @forelse ($endTimes ?? [] as $time)
                <option value="{{ $time }}" style="color: black;">{{ $time }}</option>
            @empty
                <option value="" disabled style="color: black;">{{ __('Nerasta laikų') }}</option>
            @endforelse
        </select>
        @error('time_to')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button wire:click="goToPreviousStep" type="button" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
