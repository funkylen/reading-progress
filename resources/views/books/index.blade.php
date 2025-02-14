@extends('layouts.app')

@section('title', __('book.index'))

@section('content')
    <div class="mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-primary w-100">{{ __('book.create') }}</a>
    </div>

    <section id="books" class="row row-cols-lg-2 row-cols-1 gy-3 mb-3">
        @foreach ($books as $book)
            <div class="col">
                <x-book.card :book="$book"></x-book.card>
            </div>
        @endforeach
    </section>

    <div class="row">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endsection
