@extends('layouts.app')

<?php

$books = \App\Models\Book::inProgress()->get();

?>


@section('content')
    <div class="book row">
        <section class="d-flex flex-column col-xxl-3 col-4">
            <button class="btn btn-success btn-lg w-100 mb-3">
                <i class="fa-solid fa-plus"></i>
            </button>

            <div class="list-group list-group-flush">

                <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                    The current button
                </button>

                @foreach($books as $book)
                    <button type="button"
                            class="list-group-item list-group-item-action">{{ $book->title }}</button>

                @endforeach
            </div>
        </section>
        <section class="col-xxl-9 col-8">
            <div class="mask-image-container">
                <img src="{{ asset('images/book.svg') }}" alt="Book cover">
            </div>
            <div class="mb-3">
                <h2>Book title</h2>
                <div class="text-muted">Author of the book</div>
            </div>

            <div class="progress mb-3" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                 aria-valuemin="0"
                 aria-valuemax="100">
                <div class="progress-bar w-75"></div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <button class="btn btn-secondary btn-lg w-100">Edit book</button>
                </div>
                <div class="col">
                    <button class="btn btn-primary btn-lg w-100">Update position</button>
                </div>
            </div>

        </section>
    </div>

@endsection
