@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-book.form label="{{ __('book.create') }}" button-label="{{ __('book.create') }}" :form-options="['route' => 'books.store']" />
        </div>
    </div>
@endsection
