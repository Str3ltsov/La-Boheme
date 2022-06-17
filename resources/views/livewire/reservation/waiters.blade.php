<div class="d-flex align-items-center mt-3" style="gap: 15px">
    <input
        wire:model.lazy="employee_waiter"
        class="form-check-input"
        type="radio"
        name="employeeWaiter"
        value="{{ $employee->id }}"
        @if (!$employee->available)
            disabled
        @endif
    >
    <img
        src="{{ $employee->avatar }}"
        alt="{{ $employee->name }}"
        @if ($employee->available)
            style="width: 60px; border-radius: 30px"
        @else
            style="width: 60px; border-radius: 30px; filter: grayscale(100%)"
        @endif
    >
    <label class="form-check-label">
        @if ($employee->available)
            {{ $employee->name }}
        @else
            {{ $employee->name}} {{ __('(užimtas)') }}
        @endif
    </label>
</div>
@error('employee_waiter')
    <span class="text-danger">{{ $message }}</span>
@enderror
