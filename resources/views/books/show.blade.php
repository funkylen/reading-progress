@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div>{{ $book->title }}</div>
                    <div>{{ $book->author }}</div>
                    <div>{{ $book->start_page }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col d-flex justify-content-end">
            <a href="{{ route('books.read_logs.create', $book) }}" class="btn btn-primary me-3">{{ __('Add log') }}</a>

            <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary me-3">{{ __('Edit book') }}</a>

            {!! Form::open(['route' => ['books.destroy', $book], 'method' => 'DELETE']) !!}

            <x-form.button title="{{ __('Delete Book') }}" type="danger" />

            {!! Form::close() !!}
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
                                <button class="btn btn-link btn-sm">Delete</button>
                                <button class="btn btn-link btn-sm">Edit</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
