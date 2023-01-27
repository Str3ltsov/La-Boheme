@if ($reservation_type == \App\Helpers\Constants::reservationTypeVyrtren)
    <section class="fade-in" style="width: clamp(350px, 100%, 1000px)">
        @include('livewire.reservation.questions_one')
    </section>
@elseif ($reservation_type == \App\Helpers\Constants::reservationTypeVyrtrenass)
    <section class="fade-in" style="width: clamp(350px, 100%, 1200px)">
        @include('livewire.reservation.questions_two')
    </section>
@elseif ($reservation_type == \App\Helpers\Constants::reservationTypeFiztren)
    <section class="fade-in" style="width: clamp(350px, 100%, 1200px)">
        @include('livewire.reservation.questions_three')
    </section>
@endif
