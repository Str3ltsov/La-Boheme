<div class="d-flex flex-column justify-content-center align-items-center
my-3 text-light p-5" style="font-size: 1.3em; background-color: #151515; width: clamp(400px, 100%, 1100px)">
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('1. Pageidavimai stalo/salės išdėstymui') }}</p>
        <textarea
            wire:model.lazy="question_one_answer"
            rows="4"
            class="form-control bg-transparent text-light fs-5"
            style="border-radius: 15px; border-color: #C19F5F"
            name="questionOneAnswer"
        ></textarea>
        @error('question_one_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('2. Ar svečių tarpe yra veganų, alergiškų ar tam tikrų produktų netoleruojančių žmonių?') }}</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">{{ __('Taip') }}</label>
            <input
                wire:model.lazy="question_two_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionTwoAnswer"
                value="Taip"
            >
            <label class="form-check-label">{{ __('Ne') }}</label>
            <input
                wire:model.lazy="question_two_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionTwoAnswer"
                value="Ne"
            >
        </div>
        @error('question_two_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_two_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5"
            style="border-radius: 15px; border-color: #C19F5F"
            name="questionTwoComment"
            placeholder="{{ __('Nurodykite kiekį ir alegiškus produktus jei į klausimą atsakėte taip.') }}"
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('3. Ar meniu turėtų sudaryti 3 patiekalų vakarienė (pirmasis patiekalas, karštasis patiekalas, desertas)?') }}</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">{{ __('Taip') }}</label>
            <input
                wire:model.lazy="question_three_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionThreeAnswer"
                value="Taip"
            >
            <label class="form-check-label">{{ __('Ne') }}</label>
            <input
                wire:model.lazy="question_three_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionThreeAnswer"
                value="Ne"
            >
        </div>
        @error('question_three_answer')
            <span class="text-danger mb-3">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_three_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5"
            style="border-radius: 15px; border-color: #C19F5F"
            name="questionOneComment"
            placeholder="{{ __('Nurodykite kitus poreikius jei į klausimą atsakėte ne.') }}"
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('4. Ar reikalinga erdvės, stalo dekoravimo paslauga?') }}</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">{{ __('Taip') }}</label>
            <input
                wire:model.lazy="question_four_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionFourAnswer"
                value="Taip"
            >
            <label class="form-check-label">{{ __('Ne') }}</label>
            <input
                wire:model.lazy="question_four_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionFourAnswer"
                value="Ne"
            >
        </div>
        @error('question_four_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('5. Ar reikalinga vaikiška kėdutė?') }}</p>
        <div class="d-flex flex-column flex-lg-row justify-content-sm-center
        justify-content-lg-start align-items-lg-center mb-3">
            <div class="d-flex mb-3">
                <label class="form-check-label">{{ __('Taip') }}</label>
                <input
                    wire:model.lazy="question_five_answer"
                    class="form-check-input mx-2"
                    type="radio"
                    name="questionFiveAnswer"
                    value="Taip"
                >
                <label class="form-check-label">{{ __('Ne') }}</label>
                <input
                    wire:model.lazy="question_five_answer"
                    class="form-check-input mx-2"
                    type="radio"
                    name="questionFiveAnswer"
                    value="Ne"
                >
            </div>
            <div class="d-flex justify-content-start align-items-start" style="gap: 10px">
                <p class="my-0">{{ __('Nurodykite, kiek vaikiškiškų kėdučių reikės jei į klausimą atsakėte taip:') }}</p>
                <input
                    wire:model.lazy="question_five_comment"
                    type="number"
                    min="1"
                    class="form-control bg-transparent text-light fs-5"
                    style="border-radius: 15px; border-color: #C19F5F; width: 100px"
                    name="questionFourComment"
                    oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                >
            </div>
        </div>
        @error('question_five_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('6. Ar svečių tarpe yra vaikų, kuriems reiktų siūlyti „vaikiškus“ patiekalus?') }}</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">{{ __('Taip') }}</label>
            <input
                wire:model.lazy="question_six_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionSixAnswer"
                value="Taip"
            >
            <label class="form-check-label">{{ __('Ne') }}</label>
            <input
                wire:model.lazy="question_six_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionSixAnswer"
                value="Ne"
            >
        </div>
        @error('question_six_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_six_comment"
            rows="4"
            class="form-control bg-transparent text-light fs-5"
            style="border-radius: 15px; border-color: #C19F5F"
            name="questionSixComment"
            placeholder="{{ __('Nurodykite vaikų kiekį ir patiekalus jei į klausimą atsakėte taip.') }}"
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('7. Ar reikalinga atskira garso įranga?') }}</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">{{ __('Taip') }}</label>
            <input
                wire:model.lazy="question_seven_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionSevenAnswer"
                value="Taip"
            >
            <label class="form-check-label">{{ __('Ne') }}</label>
            <input
                wire:model.lazy="question_seven_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionSevenAnswer"
                value="Ne"
            >
        </div>
        @error('question_seven_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex justify-content-end mt-4" style="gap: 20px;">
        <button wire:click="goToPreviousStep" type="button" class="fw-bold fs-4"
                style="background-color: #BBBBBB; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            <i class="fa-solid fa-arrow-left"></i>
            {{ __('Atgal') }}
        </button>
        <button wire:click="goToNextStep" type="button" class="fw-bold fs-4"
                style="background-color: #C19F5F; border: none; border-radius: 17.5px;
                color: black; padding: 10px 0; width: 120px">
            {{ __('Toliau') }}
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>
