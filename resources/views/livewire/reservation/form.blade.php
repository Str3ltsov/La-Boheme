<div>
    <form wire:submit.prevent="submit">
        <div class="d-flex flex-column justify-content-center" style="background-color: #1B3253; min-height: 100vh; padding: 2em">
            <div class="d-flex flex-column justify-content-center
            align-items-center bg-transparent p-3 fade-in" id="cormorant">
                <div class="w-50">
                    @include('flash_message')
                </div>
                <div class="d-flex justify-content-center text-center text-light">
                    <h1 style="font-size: 3em">{{ __('Rezervuok') }}</h1>
                </div>
                <div class="mb-4 mb-md-5">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" width="200"/>
                </div>
                @if ($currentStep == 1)
                    <div class="d-flex justify-content-center text-center text-light mb-2 mb-md-4">
                        <h3>
                            {{ __('Prašome atsakyti į kelis klausimus, kad pateiktume Jūsų poreikius atitinkantį pasiūlymą') }}
                        </h3>
                    </div>
                @endif
                <div class="d-flex justify-content-center text-center text-light mb-2 mb-md-4 mt-1">
                    <h3 class="me-2">{{ $steps[$currentStep]['step'] }}</h3>
                    <h3>{{ $steps[$currentStep]['description'] }}</h3>
                </div>
                @if ($currentStep == 1)
                    @include('livewire.reservation.first_step')
                @elseif ($currentStep == 2)
                    @include('livewire.reservation.second_step')
                @elseif ($currentStep == 3)
                    @include('livewire.reservation.third_step')
                {{--
                @elseif($currentStep == 4)
                    @include('livewire.reservation.fourth_step')
                --}}
                @elseif ($currentStep == 4)
                    @include('livewire.reservation.fifth_step')
                @elseif ($currentStep == 5)
                    @include('livewire.reservation.sixth_step')
                @endif
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        $(() => {
            $('#date_picker').hide();
        });

        async function fetchUnavailableDates(reservationType) {
            try {
                const response = await fetch(`{{ env('APP_URL') }}:8000/api/v1/unavailable_dates/${reservationType}`)
                const unavailableDates = await response.json();

                showDatePicker();
                getDatePickerWithUnavailableDates(unavailableDates);
            }
            catch ({ status, message }) {
                console.log(`
                    Status: ${status}\n
                    Message: ${message}
                `);
            }
        }

        function showDatePicker() {
            if ($('#reservation_type').is(':checked')) $('#date_picker').show();
        }

        function getDatePickerWithUnavailableDates(unavailableDates) {
            $(() => {
                $('#date_picker').datepicker({
                    showButtonPanel: true,
                    minDate: '{{ now()->toDateString() }}',
                    maxDate: '+3M',
                    dateFormat: 'yy-mm-dd',
                    beforeShowDay: date => {
                        $(".ui-datepicker").css('font-size', 21);
                        const dateToString = jQuery.datepicker.formatDate('yy-mm-dd', date);
                        return [unavailableDates.indexOf(dateToString) === -1]
                    }
                });
            });
        }

        function checkAllQuestions() {
            const checkbox = document.querySelector('input[name="checkAllQuestionCheckbox"]');
            const radioButtons = document.querySelectorAll('input[value="Ne"]');

            let questionAnswers = [
                'question_one_answer',
                'question_two_answer',
                'question_three_answer',
                'question_four_answer',
                // 'question_five_answer'
            ];

            for (let i = 0; i < radioButtons.length; i++) {
                if (checkbox.checked) {
                    @this.set(questionAnswers[i], radioButtons[i].value);
                    radioButtons[i].checked = true;
                }
                else {
                    @this.set(questionAnswers[i], null);
                    radioButtons[i].checked = false;
                }
            }
        }
    </script>
@endpush
