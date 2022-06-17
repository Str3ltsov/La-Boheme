<div class="d-flex flex-column justify-content-center align-items-center my-3">
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('1. Pageidavimai stalo/salės išdėstymui') }}</p>
        <textarea
            wire:model.lazy="question_one_answer"
            rows="4"
            class="form-control"
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
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_two_comment"
            rows="4"
            class="form-control"
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
        @error('question_there_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_three_comment"
            rows="4"
            class="form-control"
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
        <div class="d-flex align-items-center mb-3">
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
            <div class="d-flex justify-content-center align-items-center">
                <p class="mx-3 my-0">{{ __('Nurodykite, kiek vaikiškiškų kėdučių reikės jei į klausimą atsakėte taip:') }}</p>
                <input
                    wire:model.lazy="question_five_comment"
                    type="text"
                    class="form-control w-25"
                    name="questionFourComment"
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
            class="form-control"
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
</div>
