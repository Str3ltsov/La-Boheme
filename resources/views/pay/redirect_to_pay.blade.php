@extends('layouts.app')

@section('content')
    {!! Form::open(['route' => ['pay'], 'method' => 'post', 'id' => 'payForm']) !!}
        <button type="submit" style="display: none">{{ __('Pay') }}</button>
    {!! Form::close() !!}
@endsection

@push('scripts')
    <script>
        const payForm = document.getElementById('payForm');
        payForm.submit();
    </script>
@endpush