@extends('layouts.app')

@section('title', __('book.index'))

@section('content')
    <div class="mb-3">
        <a href="{{ route('books.create') }}" class="btn btn-primary w-100">{{ __('book.create') }}</a>
    </div>

    <section id="books" class="row row-cols-lg-2 row-cols-1 gy-3 mb-3">
        @foreach ($books as $book)
            <div class="col">

                <div class="card g-0 h-100">
                    <div class="row g-0">
                        <div class=" d-none d-xxl-block col-xxl-3 m-auto">
                            <div class="p-5">
                                <img src="{{ asset('images/book.svg') }}" class="card-img-top"
                                     alt="{{ __('book.cover') }}">
                            </div>
                        </div>
                        <div class="col col-xxl-9">
                            <div class="card-body">
                                <h5 class="card-title">{{ Str::limit($book->title, 38) }}</h5>
                                <p class="card-text"><small
                                        class="text-muted">{{ Str::limit($book->author, 50) }}</small></p>

                                <div class="mb-3">
                                    <x-book.progress :book="$book"/>
                                </div>

                                <div class="card-text row row-cols-xxl-2 row-cols-1 gy-xxl-0 gy-2">
                                    @unless($book->is_finished)
                                        <div class="col">
                                            <a href="{{ route('books.read_logs.create', $book) }}"
                                               class="btn btn-outline-primary w-100">{{ __('read_log.create') }}</a>
                                        </div>
                                    @endif
                                    <div class="col">
                                        <a href="{{ route('books.show', $book) }}"
                                           class="btn btn-outline-secondary w-100">{{ __('book.more') }}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <div class="row">
        <div class="col">
            {{ $books->links() }}
        </div>
    </div>
@endsection
