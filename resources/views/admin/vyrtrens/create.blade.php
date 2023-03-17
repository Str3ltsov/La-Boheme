@extends('layouts.app')

@section('divider-text-1')
    {{ __('Admin panel') }}
@endsection

@section('divider-text-2')
    {{ __('Head coaches') }}
@endsection

@section('content')
    <div class="container" style="padding-inline: 0">
        <div class="d-flex flex-column justify-content-start pl-20 pr-20 pr-lg-0 pl-lg-0" style="min-height: 100%; padding: 0">
            <div class="d-flex flex-column justify-content-center align-items-center bg-transparent" id="cormorant">
                <div class="d-flex flex-column justify-content-center align-items-center my-3 text-light" style="font-size: 1.1em; width: 100%">
                    <div class="w-100">
                        @include('flash_message')
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center">
                        <h3 class="mb-20 pl-0">{{ __('Add new head coach') }}</h3>
                        <div class="d-flex" style="gap: 10px">
                            <a class="fw-bold fs-4 text-center btn-hover-focus" href="{{ route('vyrtrens.index') }}"
                               style="background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 10px 25px; width: 150px; text-decoration: none">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                    {!! Form::open(['route' => ['vyrtrens.store'], 'method' => 'post', 'class' => 'mt-20', 'enctype' => "multipart/form-data", 'files' => true]) !!}
                        <div class="row">
                            <div class="form-groum col-md-4 col-xs-6">
                                <input type="text" name="first_name" class="form-control"
                                       style="border-radius: 5px;" placeholder="{{ __('First name *') }}">
                                @error('first_name')
                                <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-xs-6">
                                <input type="text" name="last_name" class="form-control"
                                       style="border-radius: 5px;" placeholder="{{ __('Last name *') }}">
                                @error('last_name')
                                <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4 col-xs-12">
                                <div class="custom-file">
                                    {!! Form::file('avatar', ['class' => 'custom-file-input form-control pt-10']) !!}
                                    {!! Form::label('avatar', __('Upload avatar'), ['class' => 'custom-file-label']) !!}
                                </div>
                                @error('avatar')
                                <span class="text-danger mt-1 fs-5 fade-in">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="reservation_type_id" value="{{ \App\Helpers\Constants::reservationTypeVyrtren }}">
                                <input type="hidden" name="available" value="{{ true }}">
                            </div>
                        </div>
                        {!! Form::button(__('Add New'), ['type' => 'submit', 'class' => 'fw-bold fs-4 text-center btn-hover-focus mt-10 mb-30',
                            'style' => 'background-color: #D3152E; border: none; border-radius: 5px; color: white; padding: 5px 25px; text-decoration: none; float: left']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
