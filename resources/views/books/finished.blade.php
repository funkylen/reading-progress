@extends('layouts.app')

@section('title', __('book.finished'))

@section('content')
    <section id="books" class="row row-cols-lg-2 row-cols-1 gy-3 mb-3">
        @foreach ($books as $book)
            <div class="col">
                <x-book.card :book="$book" :show-progress="false"></x-book.card>
            </div>
        @endforeach
    </section>

    <div class="row">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endsection
