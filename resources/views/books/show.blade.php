@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-md-2">
            <img src="{{ asset('images/book.svg') }}" class="img-thumbnail p-5" {{ __('Book Preview') }}">
        </div>
        <div class="col-md-7 mb-3">
            <h1>{{ $book->title }}</h1>
            <h2>{{ $book->author }}</h2>
            <div>{{ __('Start Page') }}: {{ $book->start_page }}</div>
            <div>{{ __('Pages Count') }}: {{ $book->pages_count }}</div>
            <div>{{ __('Current Page') }}: {{ $book->getCurrentPage() }}</div>
            <div>{{ __('Is Finished') }}: {{ $book->is_finished ? 'Yes' : 'No' }}</div>
        </div>
        <div class="col-md-3">
            <div class="d-grid gap-2">
                <a href="{{ route('books.read_logs.create', $book) }}"
                   class="btn btn-primary me-3 w-100">{{ __('Add log') }}</a>

                <a href="{{ route('books.edit', $book) }}" class="btn w-100 btn-secondary me-3">{{ __('Edit book') }}</a>

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
