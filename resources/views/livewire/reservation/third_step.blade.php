@if ($reservation_type == \App\Helpers\Constants::reservationTypeTable)
    @include('livewire.reservation.questions_one')
@elseif ($reservation_type == \App\Helpers\Constants::reservationTypeHall)
    @include('livewire.reservation.questions_two')
@endif
