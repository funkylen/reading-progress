@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Book') }}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'books.store']) !!}

                        <x-form.text name="title" label="{{ __('Title') }}" class="mb-3" />

                        <x-form.text name="author" label="{{ __('Author') }}" class="mb-3" />

                        <x-form.number name="start_page" label="{{ __('Current Page') }}" class="mb-3" />

                        <x-form.button title="{{ __('Create') }}" />

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
