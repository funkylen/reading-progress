@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-book.form label="{{ __('Create Book') }}" button-label="{{ __('Create') }}" :form-options="['route' => 'books.store']" />
        </div>
    </div>
@endsection
