@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div>{{ $book->title }}</div>
                        <div>{{ $book->author }}</div>
                        <div>{{ $book->start_page }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col d-flex justify-content-end">
                <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary me-3">{{ __('Edit book') }}</a>

                {!! Form::open(['route' => ['books.destroy', $book], 'method' => 'DELETE']) !!}

                <x-form.button title="{{ __('Delete Book') }}" type="danger" />

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
