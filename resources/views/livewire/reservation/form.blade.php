<div>
    <h2 class="mt-0">Coach reservation</h2>
    <div class="p-20 mt-40" style="background-color: #F6F7F3; border-radius: 10px;">
        <form wire:submit.prevent="submit">
            <div class="w-50">
                @include('flash_message')
            </div>
            <h4>{{ $steps[$currentStep]['step'] }} {{ $steps[$currentStep]['description'] }}</h4>
            @if ($currentStep == 1)
                @include('livewire.reservation.first_step')
{{--            @elseif ($currentStep == 2)--}}
{{--                @include('livewire.reservation.second_step')--}}
            @elseif ($currentStep == 2)
                @include('livewire.reservation.third_step')
            {{--
            @elseif($currentStep == 4)
                @include('livewire.reservation.fourth_step')
            --}}
            @elseif ($currentStep == 3)
                @include('livewire.reservation.fifth_step')
            @elseif ($currentStep == 4)
                @include('livewire.reservation.sixth_step')
            @endif
        </form>
    </div>
</div>

@push('scripts')
    <script>
        $(() => {
            $('#date_picker').hide();
        });

        async function fetchUnavailableDates(reservationType) {
            try {
                const response = await fetch(`{{ env('APP_URL') }}api/v1/unavailable_dates/${reservationType}`)
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
