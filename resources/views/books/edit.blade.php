@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <x-book.form label="{{ __('book.edit') }}" :book="$book" button-label="{{ __('book.update') }}"
                :form-options="['route' => ['books.update', $book], 'method' => 'PUT']" />
        </div>
    </div>
@endsection
