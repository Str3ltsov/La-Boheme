<div class="d-flex flex-column justify-content-center align-items-center
my-3 text-light p-4 p-lg-5" style="font-size: 1.3em; background-color: #151515">
{{--    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center w-100" style="gap: 20px;">--}}
{{--        <div>--}}
{{--            <input--}}
{{--                class="form-check-input me-2"--}}
{{--                type="checkbox"--}}
{{--                name="checkAllQuestionCheckbox"--}}
{{--                value="true"--}}
{{--                onclick="checkAllQuestions();"--}}
{{--                wire:model.lazy="isChecked"--}}
{{--                @if ($isChecked) checked @endif--}}
{{--            >--}}
{{--            <label for="checkAllQuestions" class="form-check-label">--}}
{{--                {{ __('Neturiu specialių pageidavimų') }}--}}
{{--            </label>--}}
{{--        </div>--}}
{{--        <button wire:click="goToNextStep" type="button"--}}
{{--                class="fw-bold fs-4 @if ($isChecked) d-block @else d-none @endif" id="test_reservation"--}}
{{--                style="background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 210px">--}}
{{--            {{ __('Tęsti rezervaciją') }}--}}
{{--        </button>--}}
{{--    </div>--}}
{{--    <hr class="w-100 my-5" style="height:2px; border-width: 0; color: #BBBBBB; background-color: #BBBBBB">--}}
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Kokio amžiaus trenerio ieškote?') }}</p>
        <div class="d-flex flex-column mb-3">
            @error('question_one_answer')
            <span class="text-danger fs-5">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionOneAnswer"
                    value="iki30"
                >
                <label class="form-check-label">{{ __('Iki 30 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionOneAnswer"
                    value="virs30"
                >
                <label class="form-check-label">{{ __('Virš 5 metų') }}</label>
            </div>
        </div>
{{--        <button wire:click="goToNextStep" type="button"--}}
{{--                class="fw-bold fs-4--}}
{{--                    @if ($question_one_answer--}}
{{--                        && !$question_two_answer--}}
{{--                        && !$question_three_answer--}}
{{--                        && !$question_four_answer--}}
{{--                        && !$isChecked)--}}
{{--                        d-block--}}
{{--                    @else--}}
{{--                        d-none--}}
{{--                    @endif"--}}
{{--                style="background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 210px">--}}
{{--            {{ __('Tęsti rezervaciją') }}--}}
{{--        </button>--}}
        {{--@error('question_one_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror--}}
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Kokios patirties vyr.trenerio ieškote') }}</p>
        <div class="d-flex flex-column mb-3">
            @error('question_two_answer')
            <span class="text-danger fs-5">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Iki5"
                >
                <label class="form-check-label">{{ __('Iki 5 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionTwoAnswer"
                    value="5-10"
                >
                <label class="form-check-label">{{ __('5-10 m.') }}</label>
            </div>

            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionTwoAnswer"
                    value="virs10"
                >
                <label class="form-check-label">{{ __('virš 10 m.') }}</label>
            </div>

            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionTwoAnswer"
                    value="be patirties"
                >
                <label class="form-check-label">{{ __('Be patirties') }}</label>
            </div>
        </div>
{{--        <button wire:click="goToNextStep" type="button"--}}
{{--                class="fw-bold fs-4--}}
{{--                    @if ($question_two_answer--}}
{{--                        && !$question_one_answer--}}
{{--                        && !$question_three_answer--}}
{{--                        && !$question_four_answer--}}
{{--                        && !$isChecked)--}}
{{--                        d-block--}}
{{--                    @else--}}
{{--                        d-none--}}
{{--                    @endif"--}}
{{--                style="background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 210px">--}}
{{--            {{ __('Tęsti rezervaciją') }}--}}
{{--        </button>--}}
        {{--@error('question_two_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror--}}
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Kiek asistentų gali pasirinkti treneris?') }}</p>
        <div class="d-flex flex-column mb-2">
            @error('question_three_answer')
            <span class="text-danger fs-5">{{ $message }}</span>
            @enderror
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionThreeAnswer"
                    value="1"
                >
                <label class="form-check-label">{{ __('1') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionThreeAnswer"
                    value="2"
                >
                <label class="form-check-label">{{ __('2') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionThreeAnswer"
                    value="3"
                >
                <label class="form-check-label">{{ __('3') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionThreeAnswer"
                    value="0"
                >
                <label class="form-check-label">{{ __('Nei vieno') }}</label>
            </div>
        </div>
        {{--@error('question_three_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror--}}
{{--        <textarea--}}
{{--            wire:model.lazy="question_three_comment"--}}
{{--            rows="4"--}}
{{--            class="form-control bg-transparent text-light fs-5"--}}
{{--            style="border-radius: 15px; border-color: #C19F5F"--}}
{{--            name="questionThreeComment"--}}
{{--            placeholder="Papildomi komentarai"--}}
{{--        ></textarea>--}}
{{--        <button wire:click="goToNextStep" type="button"--}}
{{--                class="fw-bold fs-4 mt-3--}}
{{--                    @if ($question_three_answer--}}
{{--                        && !$question_one_answer--}}
{{--                        && !$question_two_answer--}}
{{--                        && !$question_four_answer--}}
{{--                        && !$isChecked)--}}
{{--                        d-block--}}
{{--                    @else--}}
{{--                        d-none--}}
{{--                    @endif"--}}
{{--                style="background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 210px">--}}
{{--            {{ __('Tęsti rezervaciją') }}--}}
{{--        </button>--}}
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Koks numatytas metinis biudžėtas treneriui?') }}</p>
        <div class="d-flex flex-column justify-content-center align-items-start">
            <div class="d-flex flex-column mb-2">
                @error('question_four_answer')
                <span class="text-danger fs-5">{{ $message }}</span>
                @enderror
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionFourAnswer"
                        value="30000-50000 EUR"
                    >
                    <label class="form-check-label">{{ __('30000-50000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionFourAnswer"
                        value="50000-75000 EUR"
                    >
                    <label class="form-check-label">{{ __('50000-75000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionFourAnswer"
                        value="75000-100000 EUR"
                    >
                    <label class="form-check-label">{{ __('75000-100000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionFourAnswer"
                        value="virš 100000 EUR"
                    >
                    <label class="form-check-label">{{ __('virš 100000 EUR') }}</label>
                </div>
            </div>
{{--            <div class="d-flex flex-column flex-sm-row" style="gap: 10px">--}}
{{--                <p class="mb-2">{{ __('Nurodykite, kiek vaikiškiškų kėdučių reikės, jei į klausimą atsakėte taip:') }}</p>--}}
{{--                <input--}}
{{--                    wire:model.lazy="question_four_comment"--}}
{{--                    type="number"--}}
{{--                    min="1"--}}
{{--                    class="form-control bg-transparent text-light fs-5"--}}
{{--                    style="border-radius: 15px; border-color: #C19F5F; width: 100px; height: 45px"--}}
{{--                    name="questionFourComment"--}}
{{--                    oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"--}}
{{--                    onkeydown="return false"--}}
{{--                >--}}
{{--            </div>--}}
{{--            <button wire:click="goToNextStep" type="button"--}}
{{--                    class="fw-bold fs-4 mt-4--}}
{{--                    @if ($question_four_answer--}}
{{--                        && !$question_one_answer--}}
{{--                        && !$question_two_answer--}}
{{--                        && !$question_three_answer--}}
{{--                        && !$isChecked)--}}
{{--                        d-block--}}
{{--                    @else--}}
{{--                        d-none--}}
{{--                    @endif"--}}
{{--                    style="background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 210px">--}}
{{--                {{ __('Tęsti rezervaciją') }}--}}
{{--            </button>--}}
        </div>
        {{--@error('question_four_answer')
            <span class="text-danger mt-2">{{ $message }}</span>
        @enderror--}}
    </div>
    {{--<div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Ar svečių tarpe yra vaikų, kuriems reiktų siūlyti „vaikiškus“ patiekalus?') }}</p>
        <div class="d-flex flex-column mb-3">
            <div class="my-q">
                <input
                    wire:model.lazy="question_five_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionFiveAnswer"
                    value="Taip"
                >
                <label class="form-check-label">{{ __('Taip') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_five_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionFiveAnswer"
                    value="Ne"
                >
                <label class="form-check-label">{{ __('Ne') }}</label>
            </div>
        </div>
        @error('question_five_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_five_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5"
            style="border-radius: 15px; border-color: #C19F5F"
            name="questionFiveComment"
            placeholder="Nurodykite vaikų kiekį ir patiekalus, jei į klausimą atsakėte taip."
        ></textarea>
    </div>--}}
    <div class="d-flex justify-content-end mt-4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px" id="goToNextStepButton">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
