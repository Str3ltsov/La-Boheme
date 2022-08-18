<div class="d-flex flex-column justify-content-center align-items-center
my-3 text-light p-4 p-lg-5" style="font-size: 1.3em; background-color: #151515">
    <div class="d-flex flex-column flex-md-row justify-content-center align-items-center w-100" style="gap: 20px;">
        <div>
            <input
                class="form-check-input me-2"
                type="checkbox"
                name="checkAllQuestionCheckbox"
                value="true"
                onclick="checkAllQuestions();"
                @if ($isChecked) checked @endif
            >
            <label for="checkAllQuestions" class="form-check-label">
                {{ __('Neturiu specialių pageidavimų') }}
            </label>
        </div>
        <button wire:click="setIsCheckedToTrueAndGoToNextStep" type="button" class="fw-bold fs-4" id="test_reservation"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px; color: black; padding: 10px 0; width: 210px">
            {{ __('Tęsti rezervaciją') }}
        </button>
    </div>
    <hr class="w-100 my-5" style="height:2px; border-width: 0; color: #BBBBBB; background-color: #BBBBBB">
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Vaikiška kėdutė') }}</p>
        <div class="d-flex flex-column mb-3">
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionOneAnswer"
                    value="Taip"
                >
                <label class="form-check-label">{{ __('Taip') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionOneAnswer"
                    value="Ne"
                >
                <label class="form-check-label">{{ __('Ne') }}</label>
            </div>
        </div>
        @error('question_one_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Veganai') }}</p>
        <div class="d-flex flex-column mb-3">
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Taip"
                >
                <label class="form-check-label">{{ __('Taip') }}</label>
            </div>
            <div class="my-1">
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
        @error('question_two_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Gliuteno netoleruojantys') }}</p>
        <div class="d-flex flex-column mb-2">
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionThreeAnswer"
                    value="Taip"
                >
                <label class="form-check-label">{{ __('Taip') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_three_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionThreeAnswer"
                    value="Ne"
                >
                <label class="form-check-label">{{ __('Ne') }}</label>
            </div>
        </div>
        @error('question_three_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_three_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5"
            style="border-radius: 15px; border-color: #C19F5F"
            name="questionThreeComment"
            placeholder="Papildomi komentarai"
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Ar reikalinga vaikiška kėdutė?') }}</p>
        <div class="d-flex flex-column justify-content-center align-items-start">
            <div class="d-flex flex-column mb-2">
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionFourAnswer"
                        value="Taip"
                    >
                    <label class="form-check-label">{{ __('Taip') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_four_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionFourAnswer"
                        value="Ne"
                    >
                    <label class="form-check-label">{{ __('Ne') }}</label>
                </div>
            </div>
            <div class="d-flex flex-column flex-sm-row" style="gap: 10px">
                <p class="mb-2">{{ __('Nurodykite, kiek vaikiškiškų kėdučių reikės, jei į klausimą atsakėte taip:') }}</p>
                <input
                    wire:model.lazy="question_four_comment"
                    type="number"
                    min="1"
                    class="form-control bg-transparent text-light fs-5"
                    style="border-radius: 15px; border-color: #C19F5F; width: 100px; height: 45px"
                    name="questionFourComment"
                    oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                    onkeydown="return false"
                >
            </div>
        </div>
        @error('question_four_answer')
            <span class="text-danger mt-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
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
    </div>
    <div class="d-flex justify-content-end mt-4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="setIsCheckedToTrueAndGoToNextStep" type="button" class="fw-bold fs-4"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>

<script>
    const checkbox = document.querySelector('input[name="checkAllQuestionCheckbox"]');

    let testReservationButton = document.getElementById('test_reservation');
    testReservationButton.style.display = 'none';

    if (checkbox.checked) testReservationButton.style.display = 'block';

    @if ($isChecked)
        testReservationButton.style.display = 'block'
    @endif
</script>
