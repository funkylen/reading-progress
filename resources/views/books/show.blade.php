@extends('layouts.app')

@section('content')
    <div class="row mb-3 gy-3 gy-xxl-0">
        <div class="col-xxl-2">
            <img src="{{ asset('images/book.svg') }}" class="img-thumbnail p-5" alt="{{ __('Book Preview') }}">
        </div>
        <div class="col-xxl-7">
            <h2>{{ $book->title }}</h2>
            <h3>{{ $book->author }}</h3>
            <div class="row">
                <div class="col-2">{{ __('Start Page') }}:</div>
                <div class="col-10">{{ $book->start_page }}</div>
            </div>
            <div class="row">
                <div class="col-2">{{ __('Pages Count') }}:</div>
                <div class="col-10">{{ $book->pages_count }}</div>
            </div>
            <div class="row">
                <div class="col-2">{{ __('Current Page') }}:</div>
                <div class="col-10">{{ $book->getCurrentPage() }}</div>
            </div>
            <div class="row">
                <div class="col-2">{{ __('Is Finished') }}:</div>
                <div class="col-10">{{ $book->is_finished ? 'Yes' : 'No' }}</div>
            </div>
            <div class="row">
                <div class="col-2">{{ __('Progress') }}:</div>
                <div class="col-10">
                    <x-book.progress :book="$book" />
                </div>
            </div>
        </div>
        <div class="col-xxl-3">
            <div class="d-grid gap-2">
                @unless($book->is_finished)
                    <a href="{{ route('books.read_logs.create', $book) }}"
                       class="btn btn-primary me-3 w-100">{{ __('Add log') }}</a>
                @endunless

                <a href="{{ route('books.edit', $book) }}"
                   class="btn w-100 btn-secondary me-3">{{ __('Edit book') }}</a>

                {!! Form::open(['route' => ['books.destroy', $book], 'method' => 'DELETE']) !!}

                <x-form.button title="{{ __('Delete Book') }}" type="danger" class="w-100"/>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Pages Count') }}</th>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($book->readLogs as $key => $log)
                    <tr>
                        <th class="align-middle" scope="row">{{ $key + 1 }}</th>
                        <td class="align-middle">{{ $log->pages_count }}</td>
                        <td class="align-middle">{{ $log->date->format('d.m.Y') }}</td>
                        <td>

                            {!! Form::open(['route' => ['books.read_logs.destroy', $book, $log], 'method' => 'DELETE', 'class' => 'd-inline']) !!}
                            <button type="submit" class="btn btn-link btn-sm">Delete</button>
                            {!! Form::close() !!}

                            <a href="{{ route('books.read_logs.edit', [$book, $log]) }}"
                               class="btn btn-link btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
