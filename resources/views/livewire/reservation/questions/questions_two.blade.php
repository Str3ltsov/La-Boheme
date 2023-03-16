<div>
    <div>
        <p>{{ __('Choose what Assistant to the head coach you are looking for?') }}</p>
        <div>
                @error('question_one_answer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div>
                    <input
                        wire:model.lazy="question_one_answer"
                        type="radio"
                        name="questionOneAnswer"
                        value="Main Assistant to the head coach"
                    >
                    <label>{{ __('Main Assistant to the head coach') }}</label>
                </div>
                <div>
                    <input
                        wire:model.lazy="question_one_answer"
                        type="radio"
                        name="questionOneAnswer"
                        value="Scout"
                    >
                    <label>{{ __('Scout') }}</label>
                </div>
            <div>
                <input
                    wire:model.lazy="question_one_answer"
                    type="radio"
                    name="questionOneAnswer"
                    value="Skills development coach"
                >
                <label>{{ __('Skills development coach') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('What kind of experience are you looking for in a Assistant to the head coach?') }}</p>
        <div>
            @error('question_two_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Experience up to 5 years"
                >
                <label>{{ __('Experience up to 5 years') }}</label>
            </div>
            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Experience up to 10 years"
                >
                <label>{{ __('Experience up to 10 years') }}</label>
            </div>

            <div>
                <input
                    wire:model.lazy="question_two_answer"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Experience over 10 years"
                >
                <label>{{ __('Experience over 10 years') }}</label>
            </div>
        </div>
    </div>
    <div>
        <p>{{ __('What is the estimated annual budget for a Assistant to the head coach?') }}</p>
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
                        value="Over 50 000 EUR"
                    >
                    <label>{{ __('Over 50 000 EUR') }}</label>
                </div>
            </div>
    <div>
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Back') }}
        </button>
        <button wire:click="goToThirdStepWithTrainers" type="button" class="fw-bold fs-4 btn-hover-focus" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px">
            {{ __('Next') }}
        </button>
    </div>
</div>
