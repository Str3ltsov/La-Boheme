{!! Form::open([
    'route' => ['admin.tables.createUnavailableDateTime', $table->id],
    'method' => 'post'
    ]) !!}
    <input type="hidden" name="table_id" value="{{ $table->id }}">
    <div class="w-100 d-flex align-items-center my-3">
        <label for="unavailable_date" class="form-label w-25">Select date:</label>
        <input
            type="datetime-local" name="unavailable_datetime" class="form-control"
            min="{{ now()->format('Y-m-d') }}T12:00" max="{{ now()->addMonths(3)->format('Y-m-d') }}T00:00"
        >
    </div>
    <div class="d-flex justify-content-end align-items-center mt-2" style="gap: 10px">
        <button type="reset" class="btn btn-secondary" onclick="document.location='{{ redirect()->back() }}'">
            Nuvalyti
        </button>
        {!! Form::button('Sukurti', [
            'type' => 'submit',
            'class' => 'btn btn-success'
            ]) !!}
    </div>
{!! Form::close() !!}
