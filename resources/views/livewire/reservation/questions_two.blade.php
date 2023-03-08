<div>
    <div>
        <p>{{ __('Kokio vyr. trenerio asistento ieškote?') }}</p>
        <div>
                @error('question_one_answer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div>
                    <input
                        wire:model.lazy="question_one_answer"
                        type="radio"
                        name="questionOneAnswer"
                        value="Pagrindinio vyr. trenerio asistento"
                    >
                    <label>{{ __('Pagrindinio vyr. trenerio asistento') }}</label>
                </div>
                <div>
                    <input
                        wire:model.lazy="question_one_answer"
                        type="radio"
                        name="questionOneAnswer"
                        value="Skauto"
                    >
                    <label>{{ __('Skauto') }}</label>
                </div>
            <div>
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="Įgūdžių lavinimo trenerio"
                >
                <label>{{ __('Įgūdžių lavinimo trenerio') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Kokios patirties vyr. trenerio asistento ieškote?') }}</p>
        <div>
            @error('question_two_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Patirtis iki 5 m."
                >
                <label>{{ __('Patirtis iki 5 m.') }}</label>
            </div>
            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Patirtis iki 10 m."
                >
                <label>{{ __('Patirtis iki 10 m.') }}</label>
            </div>

            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Patirtis virš 10 m."
                >
                <label>{{ __('Patirtis virš 10 m.') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Koks numatytas metinis biudžetas vyr. trenerio asistentui?') }}</p>
        <div>
            <div>
                @error('question_three_answer')
                <span>{{ $message }}</span>
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
                <div>
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="40 000 - 50 000 EUR"
                    >
                    <label>{{ __('40 000 - 50 000 EUR') }}</label>
                </div>
                <div>
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="virš 50 000 EUR"
                    >
                    <label>{{ __('virš 50 000 EUR') }}</label>
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
