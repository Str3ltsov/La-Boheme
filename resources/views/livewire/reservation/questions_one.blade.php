<div>
    <div>
        <p>{{ __('What age coach are you looking for?') }}</p>
        <div>
            @error('question_one_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="Up to 30 years"
                >
                <label class="form-check-label">{{ __('Up to 30 years') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="Over 30 years"
                >
                <label>{{ __('Over 30 years') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('What kind of experience are you looking for in a head coach?') }}</p>
        <div>
            @error('question_two_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Experience up to 5 years"
                >
                <label>{{ __('Experience up to 5 years') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Experience 5 – 10 years"
                >
                <label>{{ __('Experience 5 – 10 years') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Experience over 10 years"
                >
                <label>{{ __('Experience over 10 years') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Without head couch experience"
                >
                <label>{{ __('Without head couch experience') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('How many assistants can a coach choose?') }}</p>
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
                    value="None"
                >
                <label>{{ __('None') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('What is the estimated annual budget for the coach?') }}</p>
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
                        value="30 000 - 50 000 EUR"
                    >
                    <label>{{ __('30 000 - 50 000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="50 000 - 75 000 EUR"
                    >
                    <label>{{ __('50 000 - 75 000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="75 000 - 100 000 EUR"
                    >
                    <label>{{ __('75 000 - 10 0000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        type="radio"
                        name="questionFourAnswer"
                        value="Over 100 000 EUR"
                    >
                    <label>{{ __('Over 100 000 EUR') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="justify-content-end mt-4">
        <button wire:click="goToPreviousStep" type="button" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Back') }}
        </button>
        <button wire:click="goToNextStep" type="button" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px" id="goToNextStepButton">
            {{ __('Next') }}
        </button>
    </div>
</div>
