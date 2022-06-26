@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('books.create') }}" class="btn btn-primary w-100">{{ __('Create Book') }}</a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="list-group">

                @foreach ($books as $book)
                    <a href="{{ route('books.show', $book) }}" class="list-group-item list-group-item-action"
                        aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $book->title }}</h5>
                        </div>
                        <p class="mb-1">{{ __('Author') }}: {{ $book->author }}</p>
                        <small>{{ __('Start Page') }}: {{ $book->start_page }}</small>
                    </a>
                @endforeach

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endsection
