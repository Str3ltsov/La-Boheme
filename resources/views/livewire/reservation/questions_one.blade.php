<div>
    <div>
        <p>{{ __('Kokio amžiaus trenerio ieškote?') }}</p>
        <div>
            @error('question_one_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="iki30"
                >
                <label class="form-check-label">{{ __('Iki 30 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="virs30"
                >
                <label>{{ __('Virš 5 metų') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Kokios patirties vyr. trenerio ieškote') }}</p>
        <div>
            @error('question_two_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Iki5"
                >
                <label>{{ __('Iki 5 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="5-10"
                >
                <label>{{ __('5-10 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="virs10"
                >
                <label>{{ __('virš 10 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="be patirties"
                >
                <label>{{ __('Be patirties') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Kiek asistentų gali pasirinkti treneris?') }}</p>
        <div>
            @error('question_three_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    type="radio"
                    name="questionThreeAnswer"
                    value="1"
                >
                <label>{{ __('1') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    type="radio"
                    name="questionThreeAnswer"
                    value="2"
                >
                <label>{{ __('2') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    type="radio"
                    name="questionThreeAnswer"
                    value="3"
                >
                <label>{{ __('3') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    type="radio"
                    name="questionThreeAnswer"
                    value="0"
                >
                <label>{{ __('Nei vieno') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('Koks numatytas metinis biudžėtas treneriui?') }}</p>
        <div>
            <div>
                @error('question_four_answer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="30000-50000 EUR"
                    >
                    <label>{{ __('30000-50000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="50000-75000 EUR"
                    >
                    <label>{{ __('50000-75000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="75000-100000 EUR"
                    >
                    <label>{{ __('75000-100000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="virš 100000 EUR"
                    >
                    <label>{{ __('virš 100000 EUR') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="justify-content-end mt-4">
        <button wire:click="goToPreviousStep" type="button" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px" id="goToNextStepButton">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
