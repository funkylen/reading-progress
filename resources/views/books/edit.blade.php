@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-books.form label="{{ __('Update Book') }}" :book="$book" button-label="{{ __('Create') }}"
                    :form-options="['route' => ['books.update', $book], 'method' => 'PUT']" />
            </div>
        </div>
    </div>
@endsection
