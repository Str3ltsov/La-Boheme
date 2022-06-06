<div class="d-flex flex-column justify-content-center align-items-center my-3">
    <div class="d-flex flex-column w-100 py-3">
        <p>1. Ar svečių tarpe yra veganų, alergiškų ar tam tikrų produktų netoleruojančių žmonių?</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">Taip</label>
            <input
                wire:model.lazy="question_one_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionOneAnswer"
                value="Taip"
            >
            <label class="form-check-label">Ne</label>
            <input
                wire:model.lazy="question_one_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionOneAnswer"
                value="Ne"
            >
        </div>
        @error('question_one_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_one_comment"
            rows="4"
            class="form-control"
            name="questionOneComment"
            placeholder="Nurodykite kiekį ir alegiškus produktus jei į klausimą atsakėte taip."
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>2. Ar meniu turėtų sudaryti 3 patiekalų vakarienė
            pirmasis patiekalas, karštasis patiekalas, desertas)?</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">Taip</label>
            <input
                wire:model.lazy="question_two_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionTwoAnswer"
                value="Taip"
            >
            <label class="form-check-label">Ne</label>
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
            placeholder="Nurodykite kitus poreikius jei į klausimą atsakėte ne."
        ></textarea>
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>3. Ar reikalinga erdvės, stalo dekoravimo paslauga?</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">Taip</label>
            <input
                wire:model.lazy="question_three_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionThreeAnswer"
                value="Taip"
            >
            <label class="form-check-label">Ne</label>
            <input
                wire:model.lazy="question_three_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionThreeAnswer"
                value="Ne"
            >
        </div>
        @error('question_three_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>4. Ar reikalinga vaikiška kėdutė?</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">Taip</label>
            <input
                wire:model.lazy="question_four_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionFourAnswer"
                value="Taip"
            >
            <label class="form-check-label">Ne</label>
            <input
                wire:model.lazy="question_four_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionFourAnswer"
                value="Ne"
            >
            <div class="d-flex justify-content-center align-items-center">
                <p class="mx-3 my-0">Nurodykite, kiek vaikiškiškų kėdučių reikės jei į klausimą atsakėte taip:</p>
                <input
                    wire:model.lazy="question_four_comment"
                    type="text"
                    class="form-control w-25"
                    name="questionFourComment"
                >
            </div>
        </div>
        @error('question_four_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="d-flex flex-column w-100 py-3">
        <p>5. Ar svečių tarpe yra vaikų, kuriems reiktų siūlyti „vaikiškus“ patiekalus?</p>
        <div class="d-flex align-items-center mb-3">
            <label class="form-check-label">Taip</label>
            <input
                wire:model.lazy="question_five_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionFiveAnswer"
                value="Taip"
            >
            <label class="form-check-label">Ne</label>
            <input
                wire:model.lazy="question_five_answer"
                class="form-check-input mx-2"
                type="radio"
                name="questionFiveAnswer"
                value="Ne"
            >
        </div>
        @error('question_five_answer')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        <textarea
            wire:model.lazy="question_five_comment"
            rows="4"
            class="form-control"
            name="questionFiveComment"
            placeholder="Nurodykite vaikų kiekį ir patiekalus jei į klausimą atsakėte taip."
        ></textarea>
    </div>
</div>
