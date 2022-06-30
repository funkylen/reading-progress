@extends('layouts.app')

@section('title', __('feedback.page_title'))

@section('content')
    {!! Form::open(['route' => 'feedback.store']) !!}

    <x-form.text name="feedback[name]" label="{{ __('Name') }}" class="mb-3" />
    <x-form.text name="feedback[email]" label="{{ __('Email') }}" class="mb-3" />

    <div class="mb-3">
        {!! Form::label('feedback[content]', __('feedback.content'), ['class' => 'form-label']) !!}
        {!! Form::textarea('feedback[content]', null, ['class' => 'form-control']) !!}
    </div>

    <x-form.button title="{{ __('feedback.send') }}"/>

    {!! Form::close() !!}
@endsection
