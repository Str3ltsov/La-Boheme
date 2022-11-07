@if ($reservation_type == \App\Helpers\Constants::reservationTypeTable)
    <section class="fade-in" style="width: clamp(350px, 100%, 1000px)">
        @include('livewire.reservation.questions_one')
    </section>
@elseif ($reservation_type == \App\Helpers\Constants::reservationTypeHall)
    <section class="fade-in" style="width: clamp(350px, 100%, 1200px)">
        @include('livewire.reservation.questions_two')
    </section>
@endif
