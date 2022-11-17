<div>
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

                    @if($showProgress)

                        <div class="mb-3">
                            <x-book.progress :book="$book"></x-book.progress>
                        </div>

                    @endif

                    <div class="card-text row gy-xxl-0 gy-2">
                        @unless($book->is_finished)
                            <div class="col-xxl-6 col-12">
                                <a href="{{ route('books.read_logs.create', $book) }}"
                                   class="btn btn-outline-primary w-100">{{ __('read_log.create') }}</a>
                            </div>
                        @endif
                        <div class="@unless($book->is_finished) col-xxl-6 @endif col-12">
                            <a href="{{ route('books.show', $book) }}"
                               class="btn btn-outline-secondary w-100">{{ __('book.more') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
