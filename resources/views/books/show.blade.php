@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="row mb-3 gy-3 gy-xxl-0">
        <div class="col-xxl-2 d-lg-block d-none">
            <img src="{{ asset('images/book.svg') }}" class="img-thumbnail p-5 bg-white h-100"
                 alt="{{ __('book.cover') }}">
        </div>
        <div class="col-12 col-xxl-7">
            <h2>{{ $book->title }}</h2>
            <h3>{{ $book->author }}</h3>
            <div class="row py-1">
                <div class="col col-xxl-4">{{ __('book.start_page') }}:</div>
                <div class="col col-xxl-8">{{ $book->start_page }}</div>
            </div>
            <div class="row py-1">
                <div class="col col-xxl-4">{{ __('book.pages_count') }}:</div>
                <div class="col col-xxl-8">{{ $book->pages_count }}</div>
            </div>
            <div class="row py-1">
                <div class="col col-xxl-4">{{ __('book.current_page') }}:</div>
                <div class="col col-xxl-8">{{ $book->getCurrentPage() }}</div>
            </div>
            <div class="row py-1">
                <div class="col col-xxl-4">{{ __('book.is_finished') }}:</div>
                <div class="col col-xxl-8">{{ $book->is_finished ? __('Yes') : __('No') }}</div>
            </div>
            <div class="row py-1">
                <div class="col col-xxl-4">{{ __('book.progress') }}:</div>
                <div class="col col-xxl-8">
                    <x-book.progress :book="$book"/>
                </div>
            </div>
        </div>
        <div class="col-xxl-3">
            <div class="d-grid gap-2">
                @unless($book->is_finished)
                    <a href="{{ route('books.read_logs.create', $book) }}"
                       class="btn btn-primary me-3 w-100">{{ __('read_log.create') }}</a>
                @endunless

                <a href="{{ route('books.edit', $book) }}"
                   class="btn w-100 btn-secondary me-3">{{ __('book.edit') }}</a>

                <button type="button"
                        class="btn btn-danger w-100"
                        data-bs-toggle="modal"
                        data-bs-target="#destroy-book">
                    {{ __('book.destroy') }}
                </button>

                {!! Form::open(['route' => ['books.destroy', $book], 'method' => 'DELETE']) !!}

                <x-modal id="destroy-book"
                         title="{{ __('book.destroy') }}"
                         message="{{ __('Are you sure you want to delete this resource?') }}"
                         submit-btn-type="danger"
                         submit-btn-title="{{ __('book.destroy') }}"/>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table bg-white">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('read_log.pages_count') }}</th>
                        <th scope="col">{{ __('read_log.date') }}</th>
                        <th scope="col">{{ __('read_log.actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($book->readLogs as $key => $log)
                        <tr>
                            <th class="align-middle" scope="row">{{ $key + 1 }}</th>
                            <td class="align-middle">{{ $log->pages_count }}</td>
                            <td class="align-middle">{{ $log->date->format('d.m.Y') }}</td>
                            <td>
                                <a href="{{ route('books.read_logs.edit', [$book, $log]) }}"
                                   class="btn btn-outline-secondary btn-sm">{{ __('Edit') }}</a>

                                <button type="button"
                                        class="btn btn-outline-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#destroy-read-log">
                                    {{ __('Delete') }}
                                </button>

                                {!! Form::open(['route' => ['books.read_logs.destroy', $book, $log], 'method' => 'DELETE', 'class' => 'd-inline']) !!}

                                <x-modal id="destroy-read-log"
                                         title="{{ __('read_log.destroy') }}"
                                         message="{{ __('Are you sure you want to delete this resource?') }}"
                                         submit-btn-type="danger"
                                         submit-btn-title="{{ __('Delete') }}"/>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
