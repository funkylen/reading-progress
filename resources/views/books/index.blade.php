@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('books.create') }}" class="btn btn-primary">{{ __('Create Book') }}</a>
            </div>
        </div>

        @foreach ($books as $book)
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div>{{ $book->title }}</div>
                            <div>{{ $book->author }}</div>
                            <div>{{ $book->start_page }}</div>
                        </div>
                        <div class="card-footer d-flex">
                            <button class="btn btn-secondary me-3">{{ __('Update book') }}</button>

                            {!! Form::open(['route' => ['books.destroy', auth()->id()]]) !!}

                            <x-form.button title="{{ __('Delete Book') }}" type="danger" />

                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
