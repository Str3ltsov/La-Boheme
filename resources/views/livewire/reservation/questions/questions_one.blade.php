<div>
    <div>
        <p class="m-0 mt-10 mb-5">{{ __('What age coach are you looking for?') }}</p>
        <div>
            @error('question_one_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_one_answer"
                        type="radio"
                        name="questionOneAnswer"
                        value="Up to 30 years"
                        class="mr-5"
                    >
                    {{ __('Up to 30 years') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_one_answer"
                        type="radio"
                        name="questionOneAnswer"
                        value="Over 30 years"
                        class="mr-5"
                    >
                    {{ __('Over 30 years') }}
                </label>
            </div>
        </div>
    </div>
    <div>
        <p class="m-0 mt-10 mb-5">{{ __('What kind of experience are you looking for in a head coach?') }}</p>
        <div>
            @error('question_two_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_two_answer"
                        type="radio"
                        name="questionTwoAnswer"
                        value="Experience up to 5 years"
                        class="mr-5"
                    >
                    {{ __('Experience up to 5 years') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_two_answer"
                        type="radio"
                        name="questionTwoAnswer"
                        value="Experience 5 – 10 years"
                        class="mr-5"
                    >
                    {{ __('Experience 5 – 10 years') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_two_answer"
                        type="radio"
                        name="questionTwoAnswer"
                        value="Experience over 10 years"
                        class="mr-5"
                    >
                    {{ __('Experience over 10 years') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_two_answer"
                        type="radio"
                        name="questionTwoAnswer"
                        value="Without head couch experience"
                        class="mr-5"
                    >
                    {{ __('Without head couch experience') }}
                </label>
            </div>
        </div>
    </div>
    <div>
        <p class="m-0 mt-10 mb-5">{{ __('How many assistants can a coach choose?') }}</p>
        <div>
            @error('question_three_answer')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="1"
                        class="mr-5"
                    >
                    {{ __('1') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="2"
                        class="mr-5"
                    >
                    {{ __('2') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="3"
                        class="mr-5"
                    >
                    {{ __('3') }}
                </label>
            </div>
            <div class="my-1">
                <label class="form-check-label">
                    <input
                        wire:model.lazy="question_three_answer"
                        type="radio"
                        name="questionThreeAnswer"
                        value="None"
                        class="mr-5"
                    >
                    {{ __('None') }}
                </label>
            </div>
        </div>
    </div>
    <div>
        <p class="m-0 mt-10 mb-5">{{ __('What is the estimated annual budget for the coach?') }}</p>
        <div>
            <div>
                @error('question_four_answer')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="my-1">
                    <label class="form-check-label">
                        <input
                            wire:model.lazy="question_four_answer"
                            type="radio"
                            name="questionFourAnswer"
                            value="30 000 - 50 000 EUR"
                            class="mr-5"
                        >
                        {{ __('30 000 - 50 000 EUR') }}
                    </label>
                </div>
                <div class="my-1">
                    <label class="form-check-label">
                        <input
                            wire:model.lazy="question_four_answer"
                            type="radio"
                            name="questionFourAnswer"
                            value="50 000 - 75 000 EUR"
                            class="mr-5"
                        >
                        {{ __('50 000 - 75 000 EUR') }}
                    </label>
                </div>
                <div class="my-1">
                    <label class="form-check-label">
                        <input
                            wire:model.lazy="question_four_answer"
                            type="radio"
                            name="questionFourAnswer"
                            value="75 000 - 100 000 EUR"
                            class="mr-5"
                        >
                        {{ __('75 000 - 10 0000 EUR') }}
                    </label>
                </div>
                <div class="my-1">
                    <label class="form-check-label">
                        <input
                            wire:model.lazy="question_four_answer"
                            type="radio"
                            name="questionFourAnswer"
                            value="Over 100 000 EUR"
                            class="mr-5"
                        >
                        {{ __('Over 100 000 EUR') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-15">
        <button wire:click="goToPreviousStep" type="button" style="background-color: #BBBBBB; border: none; border-radius: 5px; color: black; padding: 10px 0; width: 120px">
            {{ __('Back') }}
        </button>
        <button wire:click="goToThirdStepWithTrainers" type="button" style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 0; width: 120px" id="goToNextStepButton">
            {{ __('Next') }}
        </button>
    </div>
</div>
