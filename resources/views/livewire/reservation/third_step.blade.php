@if ($reservation_type == \App\Helpers\Constants::reservationTypeVyrtren)
    <section>
        @include('livewire.reservation.questions_one')
    </section>
@elseif ($reservation_type == \App\Helpers\Constants::reservationTypeVyrtrenass)
    <section>
        @include('livewire.reservation.questions_two')
    </section>
@elseif ($reservation_type == \App\Helpers\Constants::reservationTypeFiztren)
    <section>
        @include('livewire.reservation.questions_three')
    </section>
@endif
