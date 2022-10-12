<div class="d-flex flex-column justify-content-center align-items-center
my-3 text-light p-4 p-lg-5" style="font-size: 1.3em; background-color: #151515">
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Rezervacijos pobūdis:') }}</p>
        <div class="d-flex flex-column mb-2">
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionOneAnswer"
                    value="Gimtadienis"
                >
                <label class="form-check-label ms-2">{{ __('Gimtadienis') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionOneAnswer"
                    value="Įmonės vakarėlis"
                >
                <label class="form-check-label ms-2">{{ __('Įmonės vakarėlis') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionOneAnswer"
                    value="Vestuvės"
                >
                <label class="form-check-label ms-2">{{ __('Vestuvės') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionOneAnswer"
                    value="Krikštynos"
                >
                <label class="form-check-label ms-2">{{ __('Krikštynos') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionOneAnswer"
                    value="Kita (įrašykite)"
                >
                <label class="form-check-label ms-2">{{ __('Kita (įrašykite)') }}</label>
            </div>
        </div>
        @error('question_one_answer')
            <span class="text-danger mb-3 fade-in">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_one_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5 input-hover-focus fade-in"
            style="border-radius: 15px"
            name="questionOneComment"
            {{--placeholder="Nurodykite kiekį ir alergiškus produktus, jei į klausimą atsakėte taip."--}}
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Ar meniu turėtų sudaryti 3 patiekalų vakarienė (pirmasis patiekalas, karštasis patiekalas, desertas)?') }}</p>
        <div class="d-flex flex-column mb-2">
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Stovimas"
                >
                <label class="form-check-label ms-2">{{ __('Stovimas') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Sėdimas"
                >
                <label class="form-check-label ms-2">{{ __('Sėdimas') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_two_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionTwoAnswer"
                    value="Gėrimų degustacija"
                >
                <label class="form-check-label ms-2">{{ __('Gėrimų degustacija') }}</label>
            </div>
        </div>
        @error('question_two_answer')
            <span class="text-danger mb-3 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Kokius gėrimus pasiūlyti Jūsų renginiui?') }}</p>
        <div class="d-flex flex-column flex-lg-row justify-content-sm-center
        justify-content-lg-start align-items-lg-center mb-3">
            <div class="d-flex flex-column">
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input"
                        type="checkbox"
                        name="questionFourAnswerOne"
                        value="Vynas"
                    >
                    <label class="form-check-label ms-2">{{ __('Vynas') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input"
                        type="checkbox"
                        name="questionFourAnswerTwo"
                        value="Putojantis vynas"
                    >
                    <label class="form-check-label ms-2">{{ __('Putojantis vynas') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input"
                        type="checkbox"
                        name="questionFourAnswerThree"
                        value="Alus"
                    >
                    <label class="form-check-label ms-2">{{ __('Stiprieji gėrimai') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input"
                        type="checkbox"
                        name="questionFourAnswerFour"
                        value="Stiprieji gėrimai"
                    >
                    <label class="form-check-label ms-2">{{ __('Alus') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input"
                        type="checkbox"
                        name="questionFourAnswerFive"
                        value="Kokteiliai"
                    >
                    <label class="form-check-label ms-2">{{ __('Kokteiliai') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input"
                        type="checkbox"
                        name="questionFourAnswerSix"
                        value="Nealkoholiniai kokteiliai"
                    >
                    <label class="form-check-label ms-2">{{ __('Nealkoholiniai kokteiliai') }}</label>
                </div>
            </div>
            {{--<div class="d-flex flex-column flex-lg-row justify-content-start align-items-start" style="gap: 10px">
                <p class="my-0">{{ __('Nurodykite, kiek vaikiškiškų kėdučių reikės, jei į klausimą atsakėte taip:') }}</p>
                <input
                    wire:model.lazy="question_four_comment"
                    type="number"
                    min="1"
                    class="form-control bg-transparent text-light fs-5 input-hover-focus"
                    style="border-radius: 15px; width: 100px"
                    name="questionFourComment"
                    oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                >
            </div>--}}
        </div>
        @error('question_three_answer')
            <span class="text-danger mb-3 fade-in">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_three_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5 input-hover-focus"
            style="border-radius: 15px"
            name="questionFiveComment"
            placeholder="Papildomi komentara"
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Ar svečių tarpe bus veganų ar tam tikrų produktų netoleruojančių žmonių?') }}</p>
        <div class="d-flex flex-column mb-2">
            <div class="my-1">
                <input
                    wire:model.lazy="question_four_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionFourAnswer"
                    value="Taip"
                >
                <label class="form-check-label ms-2">{{ __('Taip') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_four_answer"
                    class="form-check-input"
                    type="radio"
                    name="questionFourAnswer"
                    value="Ne"
                >
                <label class="form-check-label ms-2">{{ __('Ne') }}</label>
            </div>
        </div>
        @error('question_four_answer')
            <span class="text-danger mb-3 fade-in">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Ar svečių tarpe yra vaikų, kuriems reiktų siūlyti „vaikiškus“ patiekalus?') }}</p>
        <div class="d-flex flex-column mb-3">
            <div class="my-1">
                <input
                    wire:model.lazy="question_five_answer"
                    class="form-check-input mx-2"
                    type="radio"
                    name="questionFiveAnswer"
                    value="Taip"
                >
                <label class="form-check-label">{{ __('Taip') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_five_answer"
                    class="form-check-input mx-2"
                    type="radio"
                    name="questionFiveAnswer"
                    value="Ne"
                >
                <label class="form-check-label">{{ __('Ne') }}</label>
            </div>
        </div>
        @error('question_five_answer')
        <span class="text-danger mb-3 fade-in">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_five_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5 input-hover-focus"
            style="border-radius: 15px"
            name="questionGiveComment"
            placeholder="{{ __('Nurodykite vaikų kiekį ir patiekalus, jei į klausimą atsakėte taip.') }}"
        ></textarea>
    </div>
    <div class="d-flex justify-content-end mt-4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4 btn-hover-focus"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
        </button>
    </div>
</div>
