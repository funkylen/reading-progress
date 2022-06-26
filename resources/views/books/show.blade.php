@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <h1>{{ $book->title }}</h1>
            <h2>{{ $book->author }}</h2>
            <div>{{ __('Start Page') }}: {{ $book->start_page }}</div>
            <div>{{ __('Current Page') }}: {{ $book->start_page + $readLogs->sum('pages_count') }}</div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <a href="{{ route('books.read_logs.create', $book) }}"
                        class="btn btn-primary me-3 w-100">{{ __('Add log') }}</a>
                </div>

                <div class="col-md-4 mb-3">
                    <a href="{{ route('books.edit', $book) }}" class="btn w-100 btn-secondary me-3">{{ __('Edit book') }}</a>
                </div>

                {!! Form::open(['route' => ['books.destroy', $book], 'method' => 'DELETE', 'class' => 'col-md-4 mb-3']) !!}

                <x-form.button title="{{ __('Delete Book') }}" type="danger" class="w-100" />

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

                    @foreach ($readLogs as $key => $log)
                        <tr>
                            <th class="align-middle" scope="row">{{ $key + 1 }}</th>
                            <td class="align-middle">{{ $log->pages_count }}</td>
                            <td class="align-middle">{{ $log->date->format('d-m-Y') }}</td>
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
