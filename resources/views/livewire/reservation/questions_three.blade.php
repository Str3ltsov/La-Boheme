<div class="d-flex flex-column justify-content-center align-items-center
my-3 text-light p-4 p-lg-5" style="font-size: 1.3em; background-color: #151515">
    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Kokios patirties fizinio rengimo trenerio ieškote') }}</p>
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
                    value="Iki5"
                >
                <label class="form-check-label">{{ __('Iki 5 m.') }}</label>
            </div>
            <div class="my-1">
                <input
                    wire:model.lazy="question_one_answer"
                    class="form-check-input me-2"
                    type="radio"
                    name="questionOneAnswer"
                    value="virš 5 metų"
                >
                <label class="form-check-label">{{ __('virš 5 metų') }}</label>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column w-100 py-3">
        <p>{{ __('Ar fizinio rengimo treneriui reikės dirbti su jaunimo komandomis?') }}</p>
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
    </div>

    <div class="d-flex flex-column w-100 py-3">
{{--        questionTwoAnswer--}}
        <p>{{ __('Koks numatytas metinis biudžėtas fizinio rengimo treneriui?') }}</p>
        <div class="d-flex flex-column justify-content-center align-items-start">
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
                        value="20000-30000 EUR"
                    >
                    <label class="form-check-label">{{ __('20000-30000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionThreeAnswer"
                        value="30000-40000 EUR"
                    >
                    <label class="form-check-label">{{ __('30000-40000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionThreeAnswer"
                        value="40000-50000 EUR"
                    >
                    <label class="form-check-label">{{ __('40000-50000 EUR') }}</label>
                </div>
                <div class="my-1">
                    <input
                        wire:model.lazy="question_three_answer"
                        class="form-check-input me-2"
                        type="radio"
                        name="questionThreeAnswer"
                        value="virš 50000 EUR"
                    >
                    <label class="form-check-label">{{ __('virš 500000 EUR') }}</label>
                </div>
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
