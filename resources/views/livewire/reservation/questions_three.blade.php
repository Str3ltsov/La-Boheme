<div>
    <div>
        <p>{{ __('Kokios patirties fizinio rengimo trenerio ieškote?') }}</p>
        <div>
            @error('question_one_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="Patirtis iki 5 m."
                >
                <label>{{ __('Patirtis iki 5 m.') }}</label>
            </div>
            <div>
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="Patirtis virš 5 metų"
                >
                <label>{{ __('Patirtis virš 5 metų') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Ar fizinio rengimo treneriui reikės dirbti su jaunimo komandomis?') }}</p>
        <div>
            @error('question_two_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Taip"
                >
                <label>{{ __('Taip') }}</label>
            </div>
            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Ne"
                >
                <label class="form-check-label">{{ __('Ne') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Koks numatytas metinis biudžėtas fizinio rengimo treneriui?') }}</p>
        <div>
            <div>
                @error('question_three_answer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div>
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="20 000 - 30 000 EUR"
                    >
                    <label>{{ __('20 000 - 30 000 EUR') }}</label>
                </div>
                <div>
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="30 000 - 40 000 EUR"
                    >
                    <label>{{ __('30 000 - 40 000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="40 000 - 50 000 EUR"
                    >
                    <label>{{ __('40 000 - 50 000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="Virš 50 000 EUR"
                    >
                    <label>{{ __('Virš 50 000 EUR') }}</label>
                </div>
            </div>
    <div>
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
